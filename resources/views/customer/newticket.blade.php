@extends('layouts.crmadmin')


@section('content')
    <h2>New Ticket</h2>
    <form action="{{ route('ticketStore') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label><span class="ml-2" data-bs-toggle="tooltip" data-bs-placement="right" title="This will help us to assign your ticket to the appropriate representative."><i class="fas fa-question-circle"></i></span>
            
            <span class="text-danger text-sm fst-italic"> *
                @error('category')
                    {{ $message }}
                @enderror
            </span>
            <select class="form-select custom-select" id="category" name="category">
                <option hidden value="">Select a Category</option>
                <option disabled style="border-bottom: 1px solid black">Sales</option>
                <hr>
                @foreach ($categories as $category)
                    <option value={{ $category->CategoryID}} {{ old('category') == $category->CategoryID ? 'selected' : ''}} >{{ $category->Name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="concern" class="form-label">Your concern:</label>
            <span class="text-danger text-sm fst-italic"> *
                @error('concern')
                    {{ $message }}
                @enderror
            </span>
            <p class='text-muted form-text'>(Please be provide specific information about your concern. This will greatly decrease the time needed to resolve it.)</p>
            <textarea class="form-control" id="concern" name="concern" placeholder="Please tell us what can we help you with..." rows=4 style="resize: none">{{ old('concern') }}</textarea>
        </div>
        <input type="submit" value="Submit Ticket" class="btn btn-success">
    </form>
    

@endsection