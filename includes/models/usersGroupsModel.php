<?php

class usersGroupsModel extends model
{
    protected $table = 'users_groups';

    /**
     * add UsersGroups
     * @param $groupName
     * @return bool
     */
    public function addUserGroup($groupName)
    {
        return $this->Insert(['group_name'=>$groupName]);
    }

    /**
     * update usersGroups
     * @param $id
     * @param $groupName
     * @return bool
     */
    public function updateUserGroup($id,$groupName)
    {
        return $this->Update(['group_name'=>$groupName],"WHERE `group_id`=$id");
    }

    /**
     * delete UsersGroups By ID
     * @param $id
     * @return bool
     */
    public function deleteUserGroup($id)
    {
        return $this->Delete("WHERE `group_id`=$id");
    }

    /**
     * get All UsersGroups
     * @return array
     */
    public function getAllGroups()
    {
        $this->Execute("SELECT * FROM `{$this->table}`");
        return $this->GetRows();
    }

    /**
     * get Group By Id
     * @param $id
     * @return array
     */

    public function getUsersGroupById($id)
    {
        $this->Execute("SELECT * FROM `{$this->table}` WHERE `group_id`=$id");
        return $this->GetRow();
    }
}