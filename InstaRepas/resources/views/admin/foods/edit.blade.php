
    <h2>Edit Food</h2>
    <form action="{{ route('admin.foods.update', $food) }}" method="post">
        @csrf
        @method('PUT')
        @include('admin.foods.form')
        <button type="submit" class="btn btn-primary">Update Food</button>
    </form>

