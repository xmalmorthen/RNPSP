<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Model
 * A smallest abstraction class for CI Model.
 *
 * @version   1.0.0
 * @author    José Luis Quintana <quintana.io>
 */
class MY_Model extends CI_Model
{
  protected $table_name = 'table_name';
  public function __construct()
  {
    parent::__construct();
  }
  /**
   * Find records by params
   * @param array $params         Array with Active Record params.
   * @param bool $is_row_array    Get one record. Default is FALSE. 
   * TRUE: row_array | FALSE: result_array
   * 
   * E.g:
   *   
   *  array(
   *    'select' => array(),
   *    'from' => 'TABLE_NAME',
   *    'where' => array(),
   *    'or_where' => array(),
   *    'join' => array(
   *      'TABLE_NAME_B' => array(
   *        'on' => 'TABLE_NAME_B.id = TABLE_NAME.table_b_id',
   *        'type' => 'inner'
   *      )
   *    ),
   *    'page' => 1,
   *    'items_per_page' => 20
   * 
   * @return array    Array with results.
   */
  function find($params = array(), $is_row_array = false)
  {
    try {
      $this->db->select(isset($params['select']) ? $params['select'] : array());
      $this->db->from(isset($params['from']) ? $params['from'] : $this->table_name);
      if (isset($params['join'])) {
        foreach ($params['join'] as $key => $join) {
          $this->db->join($key, $join['on'], $join['type']);
        }
      }
      $this->db->where(isset($params['where']) ? $params['where'] : array());
      $this->db->or_where(isset($params['or_where']) ? $params['or_where'] : array());
      if (isset($params['like'])) {
        foreach ($params['like'] as $key => $value) {
          $this->db->like($key, $value);
        }
      }
      if (isset($params['order_by'])) {
        foreach ($params['order_by'] as $key => $order) {
          $this->db->order_by($key, $order);
        }
      }
      $page = isset($params['page']) ? $params['page'] : 1;
      $items_per_page = isset($params['items_per_page']) ? $params['items_per_page'] : null;
      if (!empty($items_per_page)) {
        $offset = ($page - 1) * $items_per_page;
        $this->db->limit($items_per_page, $offset);
      }
      $query = $this->db->get();
      // var_dump($this->db->last_query());  
      return $is_row_array ? $query->row_array() : $query->result_array();
    } catch (Exception $e) {
      return false;
    }
  }
  /**
   * Find one record based on $query->row_array()
   * @param array $params
   * @return array
   */
  function find_one($params)
  {
    return $this->find($params, true);
  }
  /**
   * Insert records by params
   * 
   * @param array $params
   * @return boolean | int
   */
  function insert($params)
  {
    try {
      $this->db->trans_start();
      $params_insert = isset($params['params']) ? $params['params'] : array();
      $this->db->where(isset($params['where']) ? $params['where'] : array());
      $this->db->or_where(isset($params['or_where']) ? $params['or_where'] : array());
      $this->db->insert($this->table_name, $params_insert);
      $id = $this->db->insert_id();
      $this->db->trans_complete();
      if ($this->db->trans_status() === false) {
        $this->db->trans_rollback();
        return false;
      } else {
        $this->db->trans_commit();
        return $id;
      }
    } catch (Exception $e) {
      return false;
    }
  }
  /**
   * Update records by params
   * 
   * @param array $params
   * @param array $where
   * @param array $or_where Optional
   * @return boolean
   */
  function update($params)
  {
    try {
      $this->db->trans_start();
      $params_update = isset($params['params']) ? $params['params'] : array();
      $this->db->where(isset($params['where']) ? $params['where'] : array());
      $this->db->or_where(isset($params['or_where']) ? $params['or_where'] : array());
      $this->db->update($this->table_name, $params_update);
      $this->db->trans_complete();
      if ($this->db->trans_status() === false) {
        $this->db->trans_rollback();
        return false;
      } else {
        $this->db->trans_commit();
        return true;
      }
    } catch (Exception $e) {
      return false;
    }
  }

  public function select($select = '*')
  {
    $this->db->select($select);
    $this->db->from($this->nombreCatalogo);
  }

  public function join($table,$join){
    $this->db->join($table,$join);
  }

  public function where($column, $value)
  {
    $this->db->where($column, $value);
  }

  public function response_list()
  {
    $result = false;
    $query = $this->db->get();
    try {
      if ($query == false) {
        throw new Exception('Error response_list');
      }
      $result = $query->result_array();
      $query->free_result();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $result;
  }

  public function response_row()
  {
    $result = false;
    $query = $this->db->get();
    try {
      if ($query == false) {
        throw new Exception('Error response_row');
      }
      $result = $query->row_array();
      $query->free_result();
    } catch (Exception $e) {
      Msg_reporting::error_log($e);
    }
    return $result;
  }
}