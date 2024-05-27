<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <ul>
        @foreach ($employers_with_job as $employer_with_job)
            <li>
                <pre>
                    {{ $employer_with_job->name }} -> 
                    @foreach ($employer_with_job->jobs as $one_job)
                        job{{$loop->iteration !== 1 ? $loop->iteration : ''}}: {{ $one_job }}
                    @endforeach
                    
                </pre>
                
            </li>
        @endforeach
    </ul>
    
    
</body>
</html>