<?php

namespace App\Presenters;

use Nette;
use App\Model;
Use App\Forms;

class HomepagePresenter extends BasePresenter
{
    /** @var Forms\ChatFormFactory @inject */
    public $chatFormFactory;

    /** @var \ChatRepository*/
    private $chatRepository;

    public function __construct(\chatRepository $chatRepository) {
        $this->chatRepository = $chatRepository;
    }

    private $userID = 1;
    public function renderDefault() {
        $this->template->chatList = $this->chatRepository->getChatTable();
    }

    protected function createComponentProjectForm() {
        $id = $this->userID;
        return $this->chatFormFactory->create(function () {
            //$this->redirect("Homepage:");
            $this->flashMessage("Uloženo", "success");
            if(!$this->isAjax()) {
                $this->redirect("this");
            }
            else {
                $this->redrawControl("flashes");
                $this->redrawControl("list");
                $this->redrawControl("form");
            }
        }, $id);
    }
}
