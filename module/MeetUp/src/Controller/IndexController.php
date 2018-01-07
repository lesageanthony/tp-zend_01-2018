<?php

declare(strict_types=1);

namespace MeetUp\Controller;

use MeetUp\Entity\MeetUp;
use MeetUp\Repository\MeetUpRepository;
use MeetUp\Form\MeetUpForm;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

final class IndexController extends AbstractActionController
{
    /**
     * @var MeetUpRepository
     */
    private $meetUpRepository;

    /**
     * @var MeetUpForm
     */
    private $meetUpForm;

    public function __construct(MeetUpRepository $meetUpRepository, MeetUpForm $meetUpForm)
    {
        $this->meetUpRepository = $meetUpRepository;
        $this->meetUpForm = $meetUpForm;
    }

    public function indexAction()
    {
        return new ViewModel([
            'meetup' => $this->meetUpRepository->findAll(),
        ]);
    }

    public function addAction()
    {
        $form = $this->meetUpForm;

        /* @var $request Request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $meetUp = $this->meetUpRepository->createMeetUp(
                    $form->getData()['title'],
                    $form->getData()['description'],
                    $form->getData()['begin'],
                    $form->getData()['end']

                );
                $this->meetUpRepository->add($meetUp);
                return $this->redirect()->toRoute('meetup');
            }
        }

        $form->prepare();

        return new ViewModel([
            'form' => $form,
        ]);
    }
    public function editAction()
    {
        $form = $this->meetUpForm;

        /* @var $request Request */
        $request = $this->getRequest();
        $uri = $request->getUriString();
        $uriExploded = explode('=', $uri);
        $id =  $uriExploded[1];
        $oldMeetUp = $this->meetUpRepository->find($id);
        $title = $oldMeetUp->getTitle();
        $description = $oldMeetUp->getDescription();
        $begin = $oldMeetUp->getBegin();
        $end = $oldMeetUp->getEnd();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $meetUp = $this->meetUpRepository->editMeetUp(
                    $oldMeetUp,
                    $form->getData()['title'],
                    $form->getData()['description'],
                    $form->getData()['begin'],
                    $form->getData()['end']

                );
                $this->meetUpRepository->edit($meetUp);
                return $this->redirect()->toRoute('meetup');
            }
        }

        $form->prepare();

        return new ViewModel([
            'title' => $title,
            'description' => $description,
            'begin' => $begin,
            'end' => $end,
            'form' => $form,
        ]);
    }

    public function deleteAction()
    {
        $form = $this->meetUpForm;

        /* @var $request Request */
        $request = $this->getRequest();
        $uri = $request->getUriString();
        $uriExploded = explode('=', $uri);
        $id =  $uriExploded[1];
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $meetUp = $this->meetUpRepository->find($id);
            $this->meetUpRepository->delete($meetUp);
            return $this->redirect()->toRoute('meetup');
        }

        $form->prepare();

        return new ViewModel([
            'form' => $form,
        ]);
    }
}
