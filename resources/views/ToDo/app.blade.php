<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 p-10 w-full">

    <div class=' p-2  grid grid-col-12 justify-center gap-4'>


        <div class="bg-primary w-full font-semibold text-2xl text-white  py-2 px-4 rounded-md mb-6 ">
            To Do List
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="bg-slate-200 shadow-md rounded-md p-4 ">
            <form id="todo-form" action="{{ route('todo.post') }}" method="post">
                @csrf
                <label class="font-semibold text-2xl">Insert Todo</label>
                <div class="mt-2">
                    <div class="flex rounded-md  h-10 gap-2">
                        <input type="text" class="form-control rounded-md" name="task" id="todo-input"
                            placeholder="Insert new task" required value='{{ old('task') }}' />
                        <button
                            class=" bg-blue-600 w-[100px]  rounded-md px-2 font-semibold text-white hover:bg-blue-800"
                            type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>


        <div>
            <div class="bg-blue-200 shadow-md rounded-md p-4  ">
                <label for="username" class="font-semibold text-2xl">Find Todo</label>
                <div class="mt-2">
                    <form method='GET' action="{{ route('todo') }}">
                        <div class="flex rounded-md  h-10 gap-2">
                            <input type="text" name="search" value='{{ request('search') }}'
                                class="w-full rounded-md" placeholder="Insert keyword" />
                            <button type='submit'
                                class="bg-blue-600 flex flex-col rounded-md px-2 font-semibold text-white w-[100px] items-center justify-center hover:bg-blue-800">
                                <x-icons.document-search class="w-8 h-8 " />
                            </button>
                        </div>
                    </form>
                </div>
                <div class=" flex flex-col rounded-md p-2 mt-10 gap-2 justify-around ">
                    <div class="text-center  w-full ">
                        @foreach ($data as $item)
                            <div class=" bg-white rounded-md p-2 flex flex-row w-full justify-between mb-3">
                                <div class="flex flex-col w-full gap-2 font-semibold items-start px-4 justify-center">
                                    <div class="text-2xl flex text-start mb-2">
                                        <x-icons.document-text class="w-[30px] h-auto text-blue-800" />
                                        {!! $item->is_done == '1'
                                            ? '<span class="line-through decoration-4 decoration-red-500/70 decoration-wavy">'
                                            : '' !!}
                                        {{ $item->task }}
                                        {!! $item->is_done == '1' ? '</span>' : '' !!}
                                    </div>
                                </div>
                                <div class="flex bg-slate-200 w-full justify-center rounded-md">
                                    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="p-2 flex flex-col gap-2 w-full">
                                            <div>
                                                <input type="text" class="" style="display: none;"
                                                    value="{{ $item->task }}" />
                                                <div class="flex items-start">
                                                    <div class="flex flex-row gap-20 py-2">
                                                        <div class="radio px-2">
                                                            <label>
                                                                <input type="radio" value="1" name="is_done"
                                                                    {{ $item->is_done == '1' ? 'checked' : '' }}>
                                                                Done
                                                                </input>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" value="0" name="is_done"
                                                                    {{ $item->is_done == '0' ? 'checked' : '' }}>
                                                                Not yet
                                                                </input>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="rounded-md w-auto font-xs" name='task'
                                                value="{{ $item->task }}">
                                            <button type='submit'
                                                class="bg-green-500 p-2 rounded-md text-white hover:bg-green-700">
                                                <div class="flex gap-2 w-full justify-center">
                                                    <x-icons.document-report />
                                                    Update
                                                </div>
                                            </button>
                                    </form>
                                    <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method='POST'
                                        onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('delete')
                                        <button type='submit'
                                            class="bg-red-500 w-full p-2 rounded-md text-white hover:bg-red-700">
                                            <div class="flex gap-2 w-full justify-center">
                                                <x-icons.document-remove />
                                                Delete
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                    @endforeach

                </div>
                <div class="flex flex-col justify-between items-end gap-[100px] w-full">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
