<?php

class chatRepository extends Repository {
    const TABLE_CHAT = "chat",
        COLUMN_ID = "id",
        COLUMN_TITLE = "title",
        COLUMN_CONTENT = "content",
        COLUMN_USER = "name";


    /** Vrací celou tabulku
     * @return \Nette\Database\Table\Selection|null
     */
    public function getChatTable() {
        $list = $this->database->table(self::TABLE_CHAT)
            ->select("*")
            ->order(self::COLUMN_ID);
        return $list;
    }


}