<?php 
require_once("connect.php");
extract($_POST);
$status = $_POST['status'];

$result = pg_query($conn, "SELECT * FROM authors");

$rows = pg_num_rows($result);
$totalCount = pg_num_rows($result);
$search_where = '';
if(!empty($_POST['search']["value"])){

    $search_where = "where";
    $search_where .= "  first_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR last_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR email LIKE '%{$search['value']}%' ";
}

if($status != ''){
	  $search_where = "where  first_name LIKE '%{$search['value']}%' ";
	  $search_where .=  "and (groupes ='".$status."' ) ";
  }






$columns_arr = array("id","first_name","last_name","email","age","groupes");
$query =pg_query($conn, "SELECT * FROM  authors $search_where ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start}");
$r = "SELECT * FROM authors $search_where"; 
$sql =  pg_query($conn,$r);
$recordsFilterCount = pg_num_rows($query);

$recordsTotal= $totalCount;
$recordsFiltered= $recordsFilterCount;
$data = array();
$i= 1 + $start;
while($row = pg_fetch_assoc($query)){
    $row['no'] = $i++;
    $row['birthdate'] = date("d-F-Y",strtotime($row['birthdate']));
    $data[] = $row;
}
echo json_encode(array('draw'=>$draw,
                       'recordsTotal'=>$recordsTotal,
                       'recordsFiltered'=>$recordsFiltered,
                       'data'=>$data,
                       )
);
