<?php

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;
use App\Model;
use Tomaj\Form\Renderer\BootstrapVerticalRenderer;

class ChatFormFactory {
    use Nette\SmartObject;

    /** @var FormFactory */
    private $factory;

    /** @var Model\ChatFormManager */
    private $chatFormManager;

    public function __construct(FormFactory $factory, Model\ChatFormManager $chatFormManager){
        $this->factory = $factory;
        $this->chatFormManager = $chatFormManager;
    }

    public function create(callable $onSuccess, $id) {
        $form = $this->factory->create();
        $form->setRenderer(new BootstrapVerticalRenderer);

        $form->addHidden("id")
            ->setValue($id);

        $form->addText("title", "Nadpis:");

        $form->addText("content","Zpráva:")
            ->setRequired();

        $form->addSubmit("send", "Odeslat");

        $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
            $this->chatManager->insertChatTable($values->id, $values->title, $values->content);
            $onSuccess();
        };
        return $form;

    }

}
