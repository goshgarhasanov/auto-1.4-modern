<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Database\Connection;
use App\Database\Repositories\UserRepository;
use App\Services\AuthService;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class HomeController extends Controller
{
    public function __construct(
        Twig $view,
        private readonly AuthService $auth,
        private readonly UserRepository $users,
    ) {
        parent::__construct($view);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $onlineThreshold = time() - 300;
        $onlineCount     = $this->users->countOnline($onlineThreshold);
        $recentUsers     = $this->fetchRecentUsers(10);

        return $this->render($response, 'home/index.twig', [
            'online_count'  => $onlineCount,
            'recent_users'  => $recentUsers,
            'current_user'  => $this->auth->user(),
        ]);
    }

    /**
     * @return list<array{id:int,user:string,sex:int,level:int,time:int}>
     */
    private function fetchRecentUsers(int $limit): array
    {
        $pdo = Connection::pdo();
        $stmt = $pdo->prepare(
            'SELECT id, user, sex, level, time
               FROM users
              WHERE banned = 0
              ORDER BY id DESC
              LIMIT :lim',
        );
        $stmt->bindValue(':lim', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return is_array($rows) ? array_values($rows) : [];
    }
}
