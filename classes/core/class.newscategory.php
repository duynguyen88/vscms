<?php

/**
 * core/class.newscategory.php
 *
 * File contains the class used for Newscategory Model
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Core_PhotoComment Class for photo feature
 */
Class Core_Newscategory extends Core_Object
{
	
	public $id = 0;
	public $image = "";
	public $name = "";
	public $slug = "";
	public $summary = "";
	public $seotitle = "";
	public $seokeyword = "";
	public $seodescription = "";
	public $metarobot = "";
	public $parentid = 0;
	public $countitem = 0;
	public $displayorder = 0;
	public $status = 0;
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


		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'newscategory (
					nc_image,
					nc_name,
					nc_slug,
					nc_summary,
					nc_seotitle,
					nc_seokeyword,
					nc_seodescription,
					nc_metarobot,
					nc_parentid,
					nc_countitem,
					nc_displayorder,
					nc_status,
					nc_datecreated,
					nc_datemodified
					)
		        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(string)$this->image,
					(string)$this->name,
					(string)$this->slug,
					(string)$this->summary,
					(string)$this->seotitle,
					(string)$this->seokeyword,
					(string)$this->seodescription,
					(string)$this->metarobot,
					(int)$this->parentid,
					(int)$this->countitem,
					(int)$this->displayorder,
					(int)$this->status,
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


		$sql = 'UPDATE ' . TABLE_PREFIX . 'newscategory
				SET nc_image = ?,
					nc_name = ?,
					nc_slug = ?,
					nc_summary = ?,
					nc_seotitle = ?,
					nc_seokeyword = ?,
					nc_seodescription = ?,
					nc_metarobot = ?,
					nc_parentid = ?,
					nc_countitem = ?,
					nc_displayorder = ?,
					nc_status = ?,
					nc_datecreated = ?,
					nc_datemodified = ?
				WHERE nc_id = ?';

		$stmt = $this->db->query($sql, array(
					(string)$this->image,
					(string)$this->name,
					(string)$this->slug,
					(string)$this->summary,
					(string)$this->seotitle,
					(string)$this->seokeyword,
					(string)$this->seodescription,
					(string)$this->metarobot,
					(int)$this->parentid,
					(int)$this->countitem,
					(int)$this->displayorder,
					(int)$this->status,
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
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'newscategory n
				WHERE n.nc_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->id = $row['nc_id'];
		$this->image = $row['nc_image'];
		$this->name = $row['nc_name'];
		$this->slug = $row['nc_slug'];
		$this->summary = $row['nc_summary'];
		$this->seotitle = $row['nc_seotitle'];
		$this->seokeyword = $row['nc_seokeyword'];
		$this->seodescription = $row['nc_seodescription'];
		$this->metarobot = $row['nc_metarobot'];
		$this->parentid = $row['nc_parentid'];
		$this->countitem = $row['nc_countitem'];
		$this->displayorder = $row['nc_displayorder'];
		$this->status = $row['nc_status'];
		$this->datecreated = $row['nc_datecreated'];
		$this->datemodified = $row['nc_datemodified'];
		 
	}

	/**
	 * Delete current object from database, base on primary key
	 *
	 * @return int the number of deleted rows (in this case, if success is 1)
	 */
	public function delete()
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'newscategory
				WHERE nc_id = ?';
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

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'newscategory n';
        
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

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'newscategory n';

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
			$myNewscategory = new Core_Newscategory();
			
			$myNewscategory->id = $row['nc_id'];
			$myNewscategory->image = $row['nc_image'];
			$myNewscategory->name = $row['nc_name'];
			$myNewscategory->slug = $row['nc_slug'];
			$myNewscategory->summary = $row['nc_summary'];
			$myNewscategory->seotitle = $row['nc_seotitle'];
			$myNewscategory->seokeyword = $row['nc_seokeyword'];
			$myNewscategory->seodescription = $row['nc_seodescription'];
			$myNewscategory->metarobot = $row['nc_metarobot'];
			$myNewscategory->parentid = $row['nc_parentid'];
			$myNewscategory->countitem = $row['nc_countitem'];
			$myNewscategory->displayorder = $row['nc_displayorder'];
			$myNewscategory->status = $row['nc_status'];
			$myNewscategory->datecreated = $row['nc_datecreated'];
			$myNewscategory->datemodified = $row['nc_datemodified'];
			
			
            $outputList[] = $myNewscategory;			
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
	public static function getNewscategorys($formData, $sortby, $sorttype, $limit = '', $countOnly = false)
	{
		$whereString = '';
		
		
		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_id = '.(int)$formData['fid'].' ';

		if($formData['fparentid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_parentid = '.(int)$formData['fparentid'].' ';

		if($formData['fdisplayorder'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_displayorder = '.(int)$formData['fdisplayorder'].' ';

		if($formData['fstatus'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_status = '.(int)$formData['fstatus'].' ';

		if($formData['fdatecreated'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_datecreated = '.(int)$formData['fdatecreated'].' ';

		
		
		if(strlen($formData['fkeywordFilter']) > 0)
		{
			$formData['fkeywordFilter'] = Helper::unspecialtext($formData['fkeywordFilter']);

			if($formData['fsearchKeywordIn'] == 'name')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_name LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			elseif($formData['fsearchKeywordIn'] == 'summary')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_summary LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			else
				$whereString .= ($whereString != '' ? ' AND ' : '') . '( (n.nc_name LIKE \'%'.$formData['fkeywordFilter'].'%\') OR (n.nc_summary LIKE \'%'.$formData['fkeywordFilter'].'%\') )';
		}
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'DESC';
			
		
		if($sortby == 'id')
			$orderString = 'nc_id ' . $sorttype; 
		elseif($sortby == 'parentid')
			$orderString = 'nc_parentid ' . $sorttype; 
		elseif($sortby == 'countitem')
			$orderString = 'nc_countitem ' . $sorttype; 
		elseif($sortby == 'displayorder')
			$orderString = 'nc_displayorder ' . $sorttype; 
		elseif($sortby == 'status')
			$orderString = 'nc_status ' . $sorttype; 
		elseif($sortby == 'datecreated')
			$orderString = 'nc_datecreated ' . $sorttype; 
		else
			$orderString = 'nc_id ' . $sorttype;
			
		if($countOnly)
			return self::countList($whereString);
		else
			return self::getList($whereString, $orderString, $limit);
	}

   
}