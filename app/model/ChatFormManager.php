<?php

namespace App\Model;

use Nette;

class ChatFormManager {
    use Nette\SmartObject;

    const TABLE_CHAT = "chat",
        COLUMN_ID = "id",
        COLUMN_TITLE = "title",
        COLUMN_CONTENT = "content",
        COLUMN_USER = "name",

        TABLE_USERS = "users",
        COLUMN_EMAIL = "email",
        COLUMN_NAME = "name",
        COLUMN_SURNAME = "surname";


    /** @var Nette\Database\Context */
    private $database;
    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }

    /**
     * @param $values
     */
    public function insertChatTable($values) {
        $this->database->table(self::TABLE_CHAT)->insert([
            self::COLUMN_USER => $values->id,
            self::COLUMN_TITLE => $values->title,
            self::COLUMN_CONTENT => $values->content
        ]);

        //TODO: If email is already in database, use this id

        $this->database->table(self::TABLE_USERS)->insert([
            self::COLUMN_EMAIL => $values->email,
            self::COLUMN_NAME => $values->name,
            self::COLUMN_SURNAME => $values->surname
        ]);
    }
}