<?php

/**
 * core/class.news.php
 *
 * File contains the class used for News Model
 * 
 * @category Litpi
 * @package Core
 * @author Vo Duy Tuan <tuanmaster2002@yahoo.com>
 * @copyright Copyright (c) 2012 - Litpi Framework (http://www.litpi.com) 
 */

/**
 * Core_PhotoComment Class for photo feature
 */
Class Core_News extends Core_Object
{
	
	public $uid = 0;
	public $ncid = 0;
	public $id = 0;
	public $image = "";
	public $title = "";
	public $slug = "";
	public $content = "";
	public $source = "";
	public $seotitle = "";
	public $seokeyword = "";
	public $seodescription = "";
	public $metarobot = "";
	public $countview = 0;
	public $countreview = 0;
	public $displayorder = 0;
	public $status = 0;
	public $ipaddress = 0;
	public $resourceserver = 0;
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


		$sql = 'INSERT INTO ' . TABLE_PREFIX . 'news (
					u_id,
					nc_id,
					n_image,
					n_title,
					n_slug,
					n_content,
					n_source,
					n_seotitle,
					n_seokeyword,
					n_seodescription,
					n_metarobot,
					n_countview,
					n_countreview,
					n_displayorder,
					n_status,
					n_ipaddress,
					n_resourceserver,
					n_datecreated,
					n_datemodified
					)
		        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$rowCount = $this->db->query($sql, array(
					(int)$this->uid,
					(int)$this->ncid,
					(string)$this->image,
					(string)$this->title,
					(string)$this->slug,
					(string)$this->content,
					(string)$this->source,
					(string)$this->seotitle,
					(string)$this->seokeyword,
					(string)$this->seodescription,
					(string)$this->metarobot,
					(int)$this->countview,
					(int)$this->countreview,
					(int)$this->displayorder,
					(int)$this->status,
					(int)$this->ipaddress,
					(int)$this->resourceserver,
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


		$sql = 'UPDATE ' . TABLE_PREFIX . 'news
				SET u_id = ?,
					nc_id = ?,
					n_image = ?,
					n_title = ?,
					n_slug = ?,
					n_content = ?,
					n_source = ?,
					n_seotitle = ?,
					n_seokeyword = ?,
					n_seodescription = ?,
					n_metarobot = ?,
					n_countview = ?,
					n_countreview = ?,
					n_displayorder = ?,
					n_status = ?,
					n_ipaddress = ?,
					n_resourceserver = ?,
					n_datecreated = ?,
					n_datemodified = ?
				WHERE n_id = ?';

		$stmt = $this->db->query($sql, array(
					(int)$this->uid,
					(int)$this->ncid,
					(string)$this->image,
					(string)$this->title,
					(string)$this->slug,
					(string)$this->content,
					(string)$this->source,
					(string)$this->seotitle,
					(string)$this->seokeyword,
					(string)$this->seodescription,
					(string)$this->metarobot,
					(int)$this->countview,
					(int)$this->countreview,
					(int)$this->displayorder,
					(int)$this->status,
					(int)$this->ipaddress,
					(int)$this->resourceserver,
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
		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'news n
				WHERE n.n_id = ?';
		$row = $this->db->query($sql, array($id))->fetch(); 

		$this->uid = $row['u_id'];
		$this->ncid = $row['nc_id'];
		$this->id = $row['n_id'];
		$this->image = $row['n_image'];
		$this->title = $row['n_title'];
		$this->slug = $row['n_slug'];
		$this->content = $row['n_content'];
		$this->source = $row['n_source'];
		$this->seotitle = $row['n_seotitle'];
		$this->seokeyword = $row['n_seokeyword'];
		$this->seodescription = $row['n_seodescription'];
		$this->metarobot = $row['n_metarobot'];
		$this->countview = $row['n_countview'];
		$this->countreview = $row['n_countreview'];
		$this->displayorder = $row['n_displayorder'];
		$this->status = $row['n_status'];
		$this->ipaddress = $row['n_ipaddress'];
		$this->resourceserver = $row['n_resourceserver'];
		$this->datecreated = $row['n_datecreated'];
		$this->datemodified = $row['n_datemodified'];
		 
	}

	/**
	 * Delete current object from database, base on primary key
	 *
	 * @return int the number of deleted rows (in this case, if success is 1)
	 */
	public function delete()
	{
		$sql = 'DELETE FROM ' . TABLE_PREFIX . 'news
				WHERE n_id = ?';
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

		$sql = 'SELECT COUNT(*) FROM ' . TABLE_PREFIX . 'news n';
        
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

		$sql = 'SELECT * FROM ' . TABLE_PREFIX . 'news n';

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
			$myNews = new Core_News();
			
			$myNews->uid = $row['u_id'];
			$myNews->ncid = $row['nc_id'];
			$myNews->id = $row['n_id'];
			$myNews->image = $row['n_image'];
			$myNews->title = $row['n_title'];
			$myNews->slug = $row['n_slug'];
			$myNews->content = $row['n_content'];
			$myNews->source = $row['n_source'];
			$myNews->seotitle = $row['n_seotitle'];
			$myNews->seokeyword = $row['n_seokeyword'];
			$myNews->seodescription = $row['n_seodescription'];
			$myNews->metarobot = $row['n_metarobot'];
			$myNews->countview = $row['n_countview'];
			$myNews->countreview = $row['n_countreview'];
			$myNews->displayorder = $row['n_displayorder'];
			$myNews->status = $row['n_status'];
			$myNews->ipaddress = $row['n_ipaddress'];
			$myNews->resourceserver = $row['n_resourceserver'];
			$myNews->datecreated = $row['n_datecreated'];
			$myNews->datemodified = $row['n_datemodified'];
			
			
            $outputList[] = $myNews;			
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
	public static function getNewss($formData, $sortby, $sorttype, $limit = '', $countOnly = false)
	{
		$whereString = '';
		
		
		if($formData['fuid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.u_id = '.(int)$formData['fuid'].' ';

		if($formData['fncid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.nc_id = '.(int)$formData['fncid'].' ';

		if($formData['fid'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_id = '.(int)$formData['fid'].' ';

		if($formData['fcountview'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_countview = '.(int)$formData['fcountview'].' ';

		if($formData['fcountreview'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_countreview = '.(int)$formData['fcountreview'].' ';

		if($formData['fdisplayorder'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_displayorder = '.(int)$formData['fdisplayorder'].' ';

		if($formData['fstatus'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_status = '.(int)$formData['fstatus'].' ';

		if($formData['fipaddress'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_ipaddress = '.(int)$formData['fipaddress'].' ';

		if($formData['fdatecreated'] > 0)
			$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_datecreated = '.(int)$formData['fdatecreated'].' ';

		
		
		if(strlen($formData['fkeywordFilter']) > 0)
		{
			$formData['fkeywordFilter'] = Helper::unspecialtext($formData['fkeywordFilter']);

			if($formData['fsearchKeywordIn'] == 'title')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_title LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			elseif($formData['fsearchKeywordIn'] == 'content')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_content LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			elseif($formData['fsearchKeywordIn'] == 'source')
				$whereString .= ($whereString != '' ? ' AND ' : '') . 'n.n_source LIKE \'%'.$formData['fkeywordFilter'].'%\'';
			else
				$whereString .= ($whereString != '' ? ' AND ' : '') . '( (n.n_title LIKE \'%'.$formData['fkeywordFilter'].'%\') OR (n.n_content LIKE \'%'.$formData['fkeywordFilter'].'%\') OR (n.n_source LIKE \'%'.$formData['fkeywordFilter'].'%\') )';
		}
		
		//checking sort by & sort type
		if($sorttype != 'DESC' && $sorttype != 'ASC')
			$sorttype = 'DESC';
			
		
		if($sortby == 'id')
			$orderString = 'n_id ' . $sorttype; 
		elseif($sortby == 'countview')
			$orderString = 'n_countview ' . $sorttype; 
		elseif($sortby == 'countreview')
			$orderString = 'n_countreview ' . $sorttype; 
		elseif($sortby == 'displayorder')
			$orderString = 'n_displayorder ' . $sorttype; 
		elseif($sortby == 'status')
			$orderString = 'n_status ' . $sorttype; 
		elseif($sortby == 'datecreated')
			$orderString = 'n_datecreated ' . $sorttype; 
		else
			$orderString = 'n_id ' . $sorttype;
			
		if($countOnly)
			return self::countList($whereString);
		else
			return self::getList($whereString, $orderString, $limit);
	}

   
}