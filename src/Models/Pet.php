<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Connection;
use PDO;

class Pet extends Connection
{
    // cria ou atualiza o pet
    public function create(array $data, ?string $image, int $userId): void
    {
        // UPDATE
        if (isset($_SESSION['pet']['id'])) {

            $sql = "
            UPDATE pets SET
                nome = :nome,
                tipo = :tipo,
                descricao = :descricao,
                status = :status,
                visto_por_ultimo = :visto_por_ultimo,
                sexo = :sexo,
                cor = :cor,
                latitude = :latitude,
                longitude = :longitude
                " . ($image ? ", imagem = :imagem" : "") . "
            WHERE id = :id AND user_id = :user_id
        ";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':id', $_SESSION['pet']['id'], PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);

            $stmt->bindValue(':nome', $data['nome'] ?? null);
            $stmt->bindValue(':tipo', $data['tipo']);
            $stmt->bindValue(':descricao', $data['descricao'] ?? null);
            $stmt->bindValue(':status', $data['status']);
            $stmt->bindValue(':visto_por_ultimo', $data['visto_por_ultimo'] ?? null);
            $stmt->bindValue(':sexo', $data['sexo']);
            $stmt->bindValue(':cor', $data['cor'] ?? null);
            $stmt->bindValue(':latitude', null);
            $stmt->bindValue(':longitude', null);

            if ($image) {
                $stmt->bindValue(':imagem', $image);
            }

            $stmt->execute();
            return;
        }

        // INSERT
        $sql = "
        INSERT INTO pets (
            user_id, nome, tipo, descricao, status, imagem,
            visto_por_ultimo, sexo, cor, latitude, longitude
        ) VALUES (
            :user_id, :nome, :tipo, :descricao, :status, :imagem,
            :visto_por_ultimo, :sexo, :cor, :latitude, :longitude
        )
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $data['nome'] ?? null);
        $stmt->bindValue(':tipo', $data['tipo']);
        $stmt->bindValue(':descricao', $data['descricao'] ?? null);
        $stmt->bindValue(':status', $data['status']);
        $stmt->bindValue(':imagem', $image);
        $stmt->bindValue(':visto_por_ultimo', $data['visto_por_ultimo'] ?? null);
        $stmt->bindValue(':sexo', $data['sexo']);
        $stmt->bindValue(':cor', $data['cor'] ?? null);
        $stmt->bindValue(':latitude', null);
        $stmt->bindValue(':longitude', null);

        $stmt->execute();
    }


    public function takeUserPet(int $userId): array
    {
        $sql = "SELECT * FROM pets 
                WHERE user_id = :user_id 
                AND deleted_at IS NULL
                ORDER BY created_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT pets.*, 
                users.nome AS tutor_do_pet,
                users.email AS email_tutor,
                users.ddd AS ddd_tutor,
                users.telefone AS telefone_tutor
            FROM pets
            LEFT JOIN users ON users.id = pets.user_id
            WHERE pets.id = :id
            AND pets.deleted_at IS NULL
            LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
