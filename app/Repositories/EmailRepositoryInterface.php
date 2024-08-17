<?php

namespace App\Repositories;

/**
 * Interface EmailRepositoryInterface
 *
 * @package App\Repositories
 */
interface EmailRepositoryInterface
{
    /**
     * Get all emails.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Create a new email.
     *
     * @param array $data
     * @return \App\Models\Email
     */
    public function create(array $data);

    /**
     * Update an existing email.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Email
     */
    public function update($id, array $data);

    /**
     * Delete an email by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete($id);

    /**
     * Get 3 random emails.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function select();
}
