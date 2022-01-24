<html>
    <head>
    </head>
    <body>
        <div class="container">
            <h1>Phone Numbers</h1>
            <form action="{{route('customers.index')}}">
                <div class="row">
                    <div class="col-4">
                        <select class="form-select col-4" aria-label="Countries select" name="country">
                            <option selected value="">Select Country</option>
                            @foreach($countries as $country)
                            <option
                                value="{{$country['value']}}"
                                @if($country['value'] == request('country'))selected @endif
                                >
                                {{$country['label']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <select class="form-select col-4" aria-label="States select" name="state">
                            <option selected value="">Select State</option>
                            @foreach($states as $state)
                            <option
                                value="{{$state['value']}}"
                                @if($state['value'] === request('state'))selected @endif
                                >
                                {{$state['label']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>State</th>
                        <th>Country code</th>
                        <th>Phone num.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->getCountryName()}}</td>
                        <td>{{$customer->getState()}}</td>
                        <td>{{$customer->getCountryCode()}}</td>
                        <td>{{$customer->getPhone()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $customers->withQueryString()->links() }}
        </div>
    </body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        document.querySelectorAll('select').forEach((selectItem) => {
            selectItem.addEventListener('change', () => {
                document.querySelector('form').submit();
            });
        });

    </script>
</html>
