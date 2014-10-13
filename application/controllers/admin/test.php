<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function xx()
    {
		$conInfo=array('Database'=>'cms', 'UID'=>'sa', 'PWD'=>'111111');
		$conn=sqlsrv_connect('localhost', $conInfo);
		echo '<pre>';
		if( $conn == false )
		{
			die( print_r( sqlsrv_errors(), true));
		}
		else
		{
			echo("yes<br>");
		}
       // $conn=mssql_connect('localhost','pandao','1987') or die('数据库连接不上');
    }
}