<?php

namespace App\Repositories;

use App\Models\Email;

/**
 * Class EmailRepository
 *
 * @package App\Repositories
 */
class EmailRepository implements EmailRepositoryInterface {
    /**
     * Get all emails.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Email::all();
    }

    /**
     * Create a new email.
     *
     * @param array $data
     * @return \App\Models\Email
     */
    public function create(array $data)
    {
        return Email::create($data);
    }

    /**
     * Update an existing email.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Email
     */
    public function update($id, array $data)
    {
        $email = Email::findOrFail($id);
        $email->update($data);
        return $email;
    }

    /**
     * Delete an email by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
    }

    /**
     * Get 3 random emails.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function select()
    {
        $emails = Email::select('subject', 'body', 'id', 'sent_count' )->inRandomOrder()->limit(3)->get();
        return $emails;
    }
}