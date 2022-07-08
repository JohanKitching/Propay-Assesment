<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <th scope="row">{{$person->id}}</th>
                            <td>{{$person->name}}</td>
                            <td>{{$person->surname}}</td>
                            <td><a href="mailto:{{$person->email}}">{{$person->email}}</a></td>
                            <td><a href="tel:{{$person->mobileNumber}}">{{$person->mobileNumber}}</a></td>
                            <td><button type="button" class="btn btn-info btn-sm view" data-id="{{$person->id}}">View</button> <button type="button" class="btn btn-secondary btn-sm edit" data-id="{{$person->id}}">Edit</button> <button type="button" class="btn btn-danger btn-sm remove" confirm="Are your sure?" data-id="{{$person->id}}">Remove</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function(){
                       $(".edit").on("click",function () {
                           window.location.replace("editPerson/"+$(this).data('id'));
                       });
                       $(".view").on("click",function () {
                           window.location.replace("viewPerson/"+$(this).data('id'));
                       });
                       $(".remove").on("click",function () {
                           window.location.replace("removePerson/"+$(this).data('id'));
                       });
                    });
                </script>
                <div class="p-6 bg-white border-b border-gray-200">
                    Download the code <a href="code.zip" target="_blank">here</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
