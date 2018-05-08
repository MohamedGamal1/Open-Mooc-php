<?php
class usersModel extends model {

    protected $table = 'users';

    /**
     * add user
     * @param userEntity $entity
     * @return bool
     */
    public function addUser(userEntity $entity)
    {
        $data = [
            'username'      => $entity->getUsername(),
            'name'          => $entity->getName(),
            'about'         => $entity->getAbout(),
            'is_active'     => $entity->getisActive(),
            'image'         => $entity->getImage(),
            'email'         => $entity->getEmail(),
            'user_group'    => $entity->getUsergroup()
        ];
        return $this->Insert($data);
    }

    /**
     * update user by id
     * @param userEntity $entity
     * @return bool
     */
    public function updateUser(userEntity $entity)
    {
        $data = [
            'username'      => $entity->getUsername(),
            'name'          => $entity->getName(),
            'about'         => $entity->getAbout(),
            'is_active'     => $entity->getisActive(),
            'image'         => $entity->getImage(),
            'password'      => $entity->getPassword(),
            'email'         => $entity->getEmail(),
            'user_group'    => $entity->getUsergroup()
        ];
        return $this->Update($data,"WHERE `id`=".$entity->getId());
    }

    /**
     * update password by id
     * @param userEntity $entity
     * @return bool
     */
    public function updateUserPassword(userEntity $entity)
    {
        $data = ['password' => $entity->getPassword()];
        return $this->Update($data,"WHERE `id`=".$entity->getId());
    }

    /**
     * delet user by id
     */
    public function deleteUser($id)
    {
        return $this->Delete("WHERE `id`=$id");
    }


    /**
     * get all users
     */

    public function getUsers()
    {
        $this->Execute("SELECT {$this->table}.* , `users_groups`.`group_name`
                                FROM {$this->table} LEFT JOIN `users_groups`
                                ON {$this->table}.`user_group`=`users_groups`.`group_id`");
        return $this->GetRows();
    }


    /**
     * get user by id
     */
    public function getUserById($id)
    {
        $this->Execute("SELECT  {$this->table}.*, `users_groups`.`group_name` FROM {$this->table}
                                LEFT JOIN `users_groups` ON {$this->table}.`user_group`= `users_groups`.`group_id` 
                                WHERE {$this->table}.`id`= $id");
        return $this->GetRow();
    }

    /**
     * get users by group name
     */
    public function getUsersByGroup($groupKeyword)
    {
        $this->Execute("SELECT {$this->table}.* , `users_groups`.`group_name` FROM {$this->table}
                                LEFT JOIN `users_groups` ON {$this->table}.`user_group`=`users_groups`.`group_id`
                                WHERE `users_groups`.`group_name` LIKE '%$groupKeyword%'");
        return $this->GetRows();

    }

    /**
     *get users by active or not active
     */
    public function getUsersByActiveStatus($isActive)
    {
        $this->Execute("SELECT {$this->table}.`username`, {$this->table}.`email`, {$this->table}.`is_active` 
                                FROM {$this->table} WHERE {$this->table}.`is_active`= $isActive");
        return $this->GetRows();
    }

    /**
     * update users active or not active
     */
    public  function updateUserByActiveStatus(userEntity  $entity)
    {
        $data = [
            'is_active' => $entity->getisActive()
        ];

        return $this->Update($data,"WHERE `id`=".$entity->getId());
    }

    /**
     *
     */
    public function searchUsersByNameOrEmail($keywordUser)
    {
        $this->Execute("SELECT {$this->table}.`username` ,{$this->table}.`image`,{$this->table}.`email`, `users_groups`.`group_name` FROM {$this->table} 
                                LEFT JOIN `users_groups` ON {$this->table}.`user_group`=`users_groups`.`group_id` 
                                WHERE {$this->table}.`username` LIKE '%$keywordUser%' OR {$this->table}.`email` LIKE '%$keywordUser%'");
        return $this->GetRows();
    }

}