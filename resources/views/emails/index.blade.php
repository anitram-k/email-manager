@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Email List</h1>
        <a href="{{ route('emails.create') }}" class="btn btn-primary">Create Email</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Body</th>
                    <th>Sent Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emails as $email)
                    <tr>
                        <td>{{ $email->subject }}</td>
                        <td>{{ $email->body }}</td>
                        <td>{{ $email->sent_count }}</td>
                        <td>
                            <button class="btn btn-danger btn-delete" data-id="{{ $email->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/emails/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        }).then(response => response.json())
                          .then(data => {
                              Swal.fire(
                                'Deleted!',
                                data.success,
                                'success'
                              ).then(() => {
                                  location.reload();
                              });
                          });
                    }
                });
            });
        });
    </script>
@endpush