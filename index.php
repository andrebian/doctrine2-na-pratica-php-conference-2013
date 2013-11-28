<?php

require __DIR__ . '/bootstrap.php';


use DoctrineNaPratica\Model\User;

/*
 * Obtendo usuário - 1
 */
$user = new User();
$user->setName('Andre');
$user->setLogin('andrebian2');
$user->setEmail('teste@teste2.com.br');
$user->setAvatar('teste.png');

$entityManager->persist($user);
$entityManager->flush();

/*
 * Obtendo usuário - 2
 */
$user = $entityManager->find('DoctrineNaPratica\Model\User', 1);
echo "\r\n" . $user->getName() . "\r\n";
echo "\r\n" . $user->getEmail() . "\r\n";


/*
 * Obtendo usuários
 */
$users = $entityManager->getRepository('DoctrineNaPratica\Model\User')
                        ->findOneBy(array('login' => 'andrebian'));

foreach($users as $u) {
    echo "\r\n" . $u->getName() . "\r\n";
}


/*
 * Editando usuário
 */
$user = $entityManager->find('DoctrineNaPratica\Model\User', 1);
$user->setName('Teste novo');

$entityManager->persist($user);
$entityManager->flush();


/*
 * Gravando relacionamentos
 */
$user = new User();
$user->setName('Andre');
$user->setLogin('andrebian' . date('Y-m-d H:i:s'));
$user->setEmail('teste@teste2.com.br');
$user->setAvatar('teste.png');


$subscription = new DoctrineNaPratica\Model\Subscription();
$subscription->setStatus(1);
$subscription->setUser($user);
$subscription->setStarted(DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));
$user->setSubscription($subscription);

$entityManager->persist($user);
$entityManager->flush();


