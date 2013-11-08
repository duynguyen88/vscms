<?php

/**
 * core/class.usergroup.php
 *
 * File contains the class used for UserGroup Model
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Core_PhotoComment Class for photo feature
 */
Class Core_UserGroup extends Core_Object
{
	
	public $id = 0;
	public $value = 0;
	public $name = "";
	public $datecreated = 0;
	public $datemodified = 0;

    public function __construct($id = 0)
	{
		parent::__construct();
    
		if($id > 0)
			$this->getData($id);
	}
    
	/**
	 * Insert object data to database
	 * @return int The inserted record primary key
	 */
    public function addData()
    {
		$this->datecreated = time();


		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'user_group (
					ug_value,
					ug_name,
					ug_datecreated,
					ug_datemodified
					)
		        VALUES(?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(int)$this->value,
					(string)$this->name,
					(int)$this->datecreated,
					(int)$this->datemodified
					))->rowCount();

		$this->id = $this->db->lastInsertId();
		return $this->id;
	}
	
	/**
	 * Update database
	 * 
	 * @return boolean Indicate query success or not
	 */
	public function updateData()
	{                   
		$this->datemodified = time();


		$sql = 'UPDATE ' . TABLE_PREFIX . 'user_group
				SET ug_value = ?,
					ug_name = ?,
					ug_datecreated = ?,
					ug_datemodified = ?
				WHERE ug_id = ?';

		$stmt = $this->db->query($sql, array(
					(int)$this->value,
					(string)$this->name,
					(int)$this->datecreated,
					(int)$this->datemodified,
					(int)$this->id
					));

		if($stmt)
			return true;
		else
			return false;
	}
   
	/**
	 * Get the object data base on primary key
	 * @param int $id : the primary key value for searching record.
	 */
	public function getData($id)
	{
		$id = (int)$id;
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'user_group ug
				WHERE ug.ug_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->id = $row['ug_id'];
		$this->value = $row['ug_value'];
		$this->name = $row['ug_name'];
		$this->datecreated = $row['ug_datecreated'];
		$this->datemodified = $row['ug_datemodified'];
		 
	}

	/**
	 * Delete current object from database, base on primary key
	 *
	 * @return int the number of deleted rows (in this case, if success is 1)
	 */
	public function delete()
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'user_group
				WHERE ug_id = ?';
		$rowCount = $this->db->query($sql, array($this->id))->rowCount();
		
		return $rowCount;
	}
    
    /**
     * Count the record in the table base on condition in $where
	 *
	 * @param string $where: the WHERE condition in SQL string.
     */
	public static function countList($where)
	{
		global $db;

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'user_group ug';
        
		if($where != '')
			$sql .= ' WHERE ' . $where;

		return $db->query($sql)->fetchSingle();
	}

	/**
	 * Get the record in the table with paginating and filtering
	 *
	 * @param string $where the WHERE condition in SQL string
	 * @param string $order the ORDER in SQL string
	 * @param string $limit the LIMIT in SQL string
	 */
	public static function getList($where, $order, $limit = '')
	{
		global $db;

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'user_group ug';

		if($where != '')
			$sql .= ' WHERE ' . $where;

		if($order != '')
			$sql .= ' ORDER BY ' . $order;

		if($limit != '')
			$sql .= ' LIMIT ' . $limit;
			
		$outputList = array();
		$stmt = $db->query($sql);
		while($row = $stmt->fetch())
		{
			$myUserGroup = new Core_UserGroup();
			
			$myUserGroup->id = $row['ug_id'];
			$myUserGroup->value = $row['ug_value'];
			$myUserGroup->name = $row['ug_name'];
			$myUserGroup->datecreated = $row['ug_datecreated'];
			$myUserGroup->datemodified = $row['ug_datemodified'];
			
			
            $outputList[] = $myUserGroup;			
        }

        return $outputList;
    }
   
	/**
	 * Select the record, Interface with the outside (Controller Action)
	 *
	 * @param array $formData : filter array to build WHERE condition
	 * @param string $sortby : indicating the order of select
	 * @param string $sorttype : DESC or ASC
	 * @param string $limit: the limit string, offset for LIMIT in SQL string
	 * @param boolean $countOnly: flag to counting or return datalist
	 * 
	 */
	public static function getUserGroups($formData, $sortby, $sorttype, $limit = '', $countOnly = false)
	{
		$whereString = '';
		
		
		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'ug.ug_id = '.(int)$formData['fid'].' ';
		elseif(isset($formData['fvalue']))
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'ug.ug_value = '.(int)$formData['fvalue'].' ';
		
		
		if(strlen($formData['fkeywordFilter']) > 0)
		{
			$formData['fkeywordFilter'] = Helper::unspecialtext($formData['fkeywordFilter']);

			if($formData['fsearchKeywordIn'] == 'name')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'ug.ug_name LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			else
				$whereString .= ($whereString != '' ? ' AND ' : '') . '( (ug.ug_key LIKE \'%'.$formData['fkeywordFilter'].'%\') OR (ug.ug_name LIKE \'%'.$formData['fkeywordFilter'].'%\') )';
		}
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'DESC';
			
		
		if($sortby == 'id')
			$orderString = 'ug_id ' . $sorttype; 
		elseif($sortby == 'datecreated')
			$orderString = 'ug_datecreated ' . $sorttype; 
		else
			$orderString = 'ug_id ' . $sorttype;
			
		if($countOnly)
			return self::countList($whereString);
		else
			return self::getList($whereString, $orderString, $limit);
	}

	public function getGroupname($groupid)
	{
		
	}

   
}