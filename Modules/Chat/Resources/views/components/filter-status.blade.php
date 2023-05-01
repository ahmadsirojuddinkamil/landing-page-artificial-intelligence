@if (Request::is('tickets/inbox*'))
    <form method="GET" action="{{ route('inbox.filterTicketAdmin') }}"
        class="mb-3 form-group d-inline-flex align-items-center">
        <label for="status-ticket" class="form-label mr-2">View : </label>
        <select name="status" id="status-ticket" class="form-control w-auto" onchange="this.form.submit()">
            <option value="Select" {{ $status == 'Select' ? 'selected' : '' }}>Select
            </option>
            <option value="open" {{ $status == 'open' ? 'selected' : '' }}>Open
            </option>
            <option value="closed" {{ $status == 'closed' ? 'selected' : '' }}>Closed
            </option>
        </select>
    </form>
@elseif (Request::is('tickets/sent*'))
    <form method="GET" action="{{ route('inbox.filterTicketUser') }}"
        class="mb-3 form-group d-inline-flex align-items-center">
        <label for="status-ticket" class="form-label mr-2">View : </label>
        <select name="status" id="status-ticket" class="form-control w-auto" onchange="this.form.submit()">
            <option value="Select" {{ $status == 'Select' ? 'selected' : '' }}>Select
            </option>
            <option value="open" {{ $status == 'open' ? 'selected' : '' }}>Open
            </option>
            <option value="closed" {{ $status == 'closed' ? 'selected' : '' }}>Closed
            </option>
        </select>
    </form>
@elseif (Request::is('user*'))
    <form method="GET" action="{{ route('user.index') }}" class="mb-3 form-group d-inline-flex align-items-center">
        <label for="filter-role" class="form-label mr-2">Filter by role:</label>
        <select name="role" id="filter-role" class="form-control w-auto" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </form>
@endif
