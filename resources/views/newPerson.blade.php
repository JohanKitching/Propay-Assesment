<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('SavePerson') }}" class="row g-3" autocomplete="off" accept-charset="UTF-8">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="idNumber" class="form-label">Id Number</label>
                            <input type="number" class="form-control" id="idNumber" name="idNumber" minlength="13" maxlength="13" required>
                        </div>
                        <div class="col-md-6">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobileNumber" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Language" class="form-label">Language</label>
                            <select id="language" name="language" class="form-select" required>
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="English">English</option>
                                <option value="isiNdebele">isiNdebele</option>
                                <option value="isiXhosa">isiXhosa</option>
                                <option value="isiZulu">isiZulu</option>
                                <option value="Sesotho">Sesotho</option>
                                <option value="Sepedi">Sepedi</option>
                                <option value="Setswana">Setswana</option>
                                <option value="siSwati">siSwati</option>
                                <option value="Tshivenda">Tshivenda</option>
                                <option value="Xitsonga">Xitsonga</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="interests" class="form-label">Interests</label>
                            <select id="interests" name="interests[]" multiple class="form-select" required>
                                <option value="3D printing">3D printing</option>
                                <option value="Reading">Reading</option>
                                <option value="Fishkeeping">Fishkeeping</option>
                                <option value="Calligraphy">Calligraphy</option>
                                <option value="Sewing">Sewing</option>
                                <option value="Quilling">Quilling</option>
                                <option value="Computer Programming">Computer Programming</option>
                                <option value="Table Tennis">Table Tennis</option>
                                <option value="Fishing">Fishing</option>
                                <option value="Rugby">Rugby</option>
                                <option value="Sailing">Sailing</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary save">Save</button> <button type="button" class="btn btn-secondary cancel">Cancel</button>
                        </div>
                    </form>
                    <script>
                        @isset($people)
                            $("#name").val("{{$people->name}}");
                            $("#surname").val("{{$people->surname}}");
                            $("#idNumber").val("{{$people->idNumber}}");
                            $("#birthDate").val("{{$people->birthDate}}");
                            $("#mobileNumber").val("{{$people->mobileNumber}}");
                            $("#email").val("{{$people->email}}");
                            $("#language").val("{{$people->language}}");
                            @if (is_array(unserialize($people->interests)))
                                @foreach(unserialize($people->interests) as $interest)
                                    $("#interests option[value='{{$interest}}']").attr('selected','selected');
                                @endforeach
                            @else
                                $("#interests option[value='{{unserialize($people->interests)}}']").attr('selected','selected');
                            @endif
                            $('<input>').attr({
                                type: 'hidden',
                                value: '{{$people->id}}',
                                name: 'update'
                            }).appendTo('form');
                        @endisset
                        @isset($viewPerson)
                            $("#name").replaceWith("<h5>{{$viewPerson->name}}</h5>");
                            $("#surname").replaceWith("<h5>{{$viewPerson->surname}}</h5>");
                            $("#idNumber").replaceWith("<h5>{{$viewPerson->idNumber}}</h5>");
                            $("#birthDate").replaceWith("<h5>{{$viewPerson->birthDate}}</h5>");
                            $("#mobileNumber").replaceWith("<h5>{{$viewPerson->mobileNumber}}</h5>");
                            $("#email").replaceWith("<h5>{{$viewPerson->email}}</h5>");
                            $("#language").replaceWith("<h5>{{$viewPerson->language}}</h5>");
                            @if (is_array(unserialize($viewPerson->interests)))
                                var interests='';
                                @foreach(unserialize($viewPerson->interests) as $interest)
                                    console.log("{{$interest}}");
                                    interests+="{{$interest}}<br>";
                                @endforeach
                                $("#interests").replaceWith("<h5>"+interests+"</h5>");
                            @else
                                $("#interests").replaceWith("<h5>{{unserialize($viewPerson->interests)}}</h5>");
                            @endif
                            $(".save").replaceWith("");
                            $("label").addClass("text-secondary");
                        @endisset
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
