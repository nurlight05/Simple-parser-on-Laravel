<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                All
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">№</th>
                        <th>Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Published date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $index => $item)
                        <tr>
                            <td class="text-center text-muted">
                                {{ $index + 1 }}
                            </td>
                            <td class="text-truncate" style="max-width: 350px;" title="{{ $item->title }}">
                                {{ $item->title }}
                            </td>
                            <td class="text-center text-truncate" style="max-width: 150px;" title="{{ $item->author ?? '-' }}">
                                {{ $item->author ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $item->pubdate }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" disabled>Details</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <button class="btn btn-primary" style="background-color: #004BA3; border: #004BA3; padding: 4px 15px;" type="button" wire:click="loadMore">
                    <span wire:loading wire:target="loadMore" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:loading wire:target="loadMore">Loading</span>
                    <span wire:loading.remove wire:target="loadMore">Show more</span>
                </button>
            </div>
        </div>
    </div>
</div>
