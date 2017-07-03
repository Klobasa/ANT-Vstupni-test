<?php

namespace App\Presenters;

use Nette;
use App\Model;
Use App\Forms;

class HomepagePresenter extends BasePresenter
{
    /** @var Forms\ChatFormFactory @inject */
    public $chatFormFactory;

    private $userID = 1;
    public function renderDefault() {

    }

    protected function createComponentProjectForm() {
        $id = $this->userID;
        return $this->chatFormFactory->create(function () {
            $this->redirect("Homepage:");
            $this->flashMessage("Uloženo", "success");
        }, $id);
    }
}
