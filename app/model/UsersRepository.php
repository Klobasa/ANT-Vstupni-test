<?php

class UsersRepository extends Repository {
    const TABLE_USER = "users",
        COLUMN_ID = "id",
        COLUMN_EMAIL = "email",
        COLUMN_NAME = "name",
        COLUMN_SURNAME = "surname";

    public function add($email, $name, $surname) {

    }
}