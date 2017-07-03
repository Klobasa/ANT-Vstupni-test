<?php

namespace App\Model;

use Nette;

class ChatFormManager {
    use Nette\SmartObject;

    const TABLE_CHAT = "chat",
        COLUMN_ID = "id",
        COLUMN_TITLE = "title",
        COLUMN_CONTENT = "content",
        COLUMN_USER = "name";


    /** @var Nette\Database\Context */
    private $database;
    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function insertChatTable($id, $title, $content) {
        $this->database->table(self::TABLE_CHAT)->insert([
            self::COLUMN_USER => $id,
            self::COLUMN_TITLE => $title,
            self::COLUMN_CONTENT => $content
        ]);
    }
}