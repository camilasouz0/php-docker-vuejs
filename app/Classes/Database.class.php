<?php

namespace App\Classes;

use PDO;
use PDOException;

class Database {

	private $host = DB_HOST;
	private $user = DB_USERNAME;
	private $pass = DB_PASSWORD;
	private $dbname = DB_DATABASE;
	private $port = DB_PORT;

	private $dbh;
	private $error;
	private $stmt;

	public function __construct() {

		$dsn = "pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname.";";

		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_EMULATE_PREPARES => false,
		);

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
		}
	}

	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	public function getQuery() {
		return $this->stmt;
	}

	public function bind($param, $value, $type = null) {
		if (is_null($type)) {
			switch (true) {
			case is_int($value):
				$type = PDO::PARAM_INT;
				break;
			case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
			case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
			default:
				$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute() {
		return $this->stmt->execute();
	}

	public function resultset() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single() {
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount() {
		return $this->stmt->rowCount();
	}

	public function lastInsertId() {
		return $this->dbh->lastInsertId();
	}

	public function beginTransaction() {
		return $this->dbh->beginTransaction();
	}

	public function endTransaction() {
		return $this->dbh->commit();
	}

	public function cancelTransaction() {
		return $this->dbh->rollBack();
	}

	public function debugDumpParams() {
		return $this->stmt->debugDumpParams();
	}

	public function interpolateQuery($query, $params) {
		$keys = array();
		$values = $params;

		foreach ($params as $key => $value) {
			if (is_string($key)) {
				$keys[] = '/:' . $key . '/';
			} else {
				$keys[] = '/[?]/';
			}

			if (is_string($value)) {
				$values[$key] = "'" . $value . "'";
			}

			if (is_array($value)) {
				$values[$key] = "'" . implode("','", $value) . "'";
			}

			if (is_null($value)) {
				$values[$key] = 'NULL';
			}
		}

		$query = preg_replace($keys, $values, $query, 1, $count);

		return $query;
	}

	public function errorInfo() {
		return $this->stmt->errorInfo();
	}

}