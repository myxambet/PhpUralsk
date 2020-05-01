<?php 
 namespace Myproj\Services;
class Db  
{

private $pdo;

public function __construct()
{
    $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

    $this->pdo = new \PDO(
        'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
        $dbOptions['user'],
        $dbOptions['password']
    );
    $this->pdo->exec('SET NAMES UTF8');
}
public function query(string $sql, $params = [],string $className = 'stdClass'): ?array
{
$sth = $this->pdo->prepare($sql);
$result = $sth->execute($params);
if(false == $result)
{
    return null;
}

return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
}
}