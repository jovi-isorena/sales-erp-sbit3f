@extends('layouts.app')
 

@section('content')
    <a href="{{ route('myTicket') }}" class='btn btn-secondary mb-3'>Back to My Tickets</a>

    {{-- <h1>Ticket# {{ $ticket->TicketNo }}</h1>
    <small>Created On: {{ date('M d Y H:m A', strtotime($ticket->CreatedDatetime)) }}</small>
    <p>Your Concern:</p>
    <q> {{ $ticket->Content }} </q>  --}}

    <div class="card mb-3 shadow">
        <div class="card-header d-md-flex justify-content-between align-items-center">
            <span class="card-title align-items-center">
                <h1>{{ $ticket->TicketStatus == 'Closed' ? '[CLOSED]' : '' }}Ticket# {{ $ticket->TicketNo }}</h1>
                <small>Created On: {{ date('M d Y H:m A', strtotime($ticket->CreatedDatetime)) }}</small>
                <p>Your Concern:</p>
                <q> {{ $ticket->Content }} </q> 
            </span>
            
        </div>
        <div class="card-body">
            @if (count($ticket->comments))
                <div class="mb-3">
                    <span class="lead">
                        Responses ({{ $ticket->comments->count() }})
                    </span> 
                    <div class="border border-2 p-2" id="responses" style="max-height:400px;overflow-y:scroll;scroll:auto">
                        @foreach ($ticket->comments as $comment)
                            <div class="mb-3">
                                <p class="fw-bold">{{ $comment->FromRep == 1 ? 'Representative ' . $comment->employee->FirstName : 'You' }} said on {{  date('M d Y H:m A', strtotime($comment->CreatedDatetime)) }}</p>
                                <p> {{$comment->Content}}</p>
                            </div>
                            @if (!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                        
                    </div>
                </div>
            @else
                <div>
                    <span class='m-auto'>Your ticket is in queue. Kindly wait for a representative's response</span>
                </div>
            @endif
            
        </div>
        @if ($answered == 1)
            <div class="card-footer pt-3">
                <div class="{{ $ticket->TicketStatus == 'Closed' ? 'd-none' : '' }}">
                    <h3>Is your concern has been resolved?</h3>
                    <div class="row justify-content-between">
                        <div class="col">
                            <button class="btn btn-primary w-100" onclick="showHideDiv('resolved','unresolved')">Yes, it has been resolved.</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-secondary w-100" onclick="showHideDiv('unresolved','resolved')">No, I need more help.</button>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <input type="hidden" name="jumpdown" id="jumpdown">
                @endif
                <div id="resolved" style=" display: @if ($errors->has('csat1') ||$errors->has('csat2') ||$errors->has('nps') || $ticket->TicketStatus == 'Closed' ) block @else none @endif " class="pt-3">
                    <div class="m-auto justify-content-center w-75">
                        <p class="lead">Wonderful!</p>
                        <p>Please help us to improve! Your feedback will be greatly appreciated.</p>
                        <p>Kindly rate us based on your experience on this ticket. 1 is the lowest. 5 is the highest.</p>
                        <form action="/ticket/{{ $ticket->TicketNo }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <table class="table table-hover text-center mb-3 border rounded">
                                <thead class="table-info mb-1">
                                    <tr class="text-center">
                                        <th></th>
                                        <th scope="col">1</th>
                                        <th scope="col">2</th>
                                        <th scope="col">3</th>
                                        <th scope="col">4</th>
                                        <th scope="col">5</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <tr  class="@error('csat1') alert-danger @enderror">
                                        <td>How satisfied are you with our overall products or services?
                                            @error('csat1')
                                                <br><span class="text-danger small fst-italic">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td><input type="radio" name="csat1" value="1" class="form-check-input m-0" {{ old('csat1') == 1 || $ticket->CSAT1 == 1 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat1" value="2" class="form-check-input m-0" {{ old('csat1') == 2 || $ticket->CSAT1 == 2 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat1" value="3" class="form-check-input m-0" {{ old('csat1') == 3 || $ticket->CSAT1 == 3 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat1" value="4" class="form-check-input m-0" {{ old('csat1') == 4 || $ticket->CSAT1 == 4 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat1" value="5" class="form-check-input m-0" {{ old('csat1') == 5 || $ticket->CSAT1 == 5 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                    </tr>
                                    <tr class="@error('csat2')  alert-danger @enderror">
                                        <td>How helpful is the last representative with your concern?
                                            @error('csat2')
                                                <br><span class="text-danger small fst-italic">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td><input type="radio" name="csat2" value="1" class="form-check-input m-0" {{ old('csat2') == 1 || $ticket->CSAT2 == 1 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat2" value="2" class="form-check-input m-0" {{ old('csat2') == 2 || $ticket->CSAT2 == 2 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat2" value="3" class="form-check-input m-0" {{ old('csat2') == 3 || $ticket->CSAT2 == 3 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat2" value="4" class="form-check-input m-0" {{ old('csat2') == 4 || $ticket->CSAT2 == 4 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="csat2" value="5" class="form-check-input m-0" {{ old('csat2') == 5 || $ticket->CSAT2 == 5 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                    </tr>
                                    <tr class="@error('nps')  alert-danger @enderror">
                                        <td>How likely will you recommend our business to your friends and relatives?
                                            @error('nps')
                                                <br><span class="text-danger small fst-italic">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td><input type="radio" name="nps" value="1" class="form-check-input m-0" {{ old('nps') == 1 || $ticket->NPS == 1 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="nps" value="2" class="form-check-input m-0" {{ old('nps') == 2 || $ticket->NPS == 2 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="nps" value="3" class="form-check-input m-0" {{ old('nps') == 3 || $ticket->NPS == 3 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="nps" value="4" class="form-check-input m-0" {{ old('nps') == 4 || $ticket->NPS == 4 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                        <td><input type="radio" name="nps" value="5" class="form-check-input m-0" {{ old('nps') == 5 || $ticket->NPS == 5 ? 'checked' : '' }} {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                Please tell us more about your experience:
                                <textarea name="feedback" id="" rows="2" class="w-100 form-control mb-3" placeholder="Optional, but highly appreciated..." {{ $ticket->TicketStatus == 'Closed' ? 'disabled' : '' }}>{{ old('feedback') }}</textarea>
                                @if ($ticket->TicketStatus == 'Open')
                                    <input type="submit" value="Submit Feedback" class="btn btn-primary btn-block">
                                @endif
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div id="unresolved" style="display: {{ $errors->has('Content') ? 'block' : 'none' }} " class="pt-3">
                    <div class="w-75 m-auto">
                        <p class="lead">No Worries!</p>
                        <p>We'll be glad to further help you.</p>
                        <p class="text-muted">Note: Please provide more details about your concern. Clear and complete details will greatly help to resolve your concern.</p>
                        <form action="/comment/customercomment" method="POST">
                            @csrf
                            <input type="hidden" name="TicketNo" value={{ $ticket->TicketNo }}>
                            @error('Content')
                                <span class="text-danger small fst-italic"> {{ $message }}</span>
                            @enderror
                            <textarea name="Content" id="commentContent"  rows="4" class="form-control mb-3  {{ $errors->has('Content') ? 'is-invalid' : '' }} " placeholder="Please let us know more about your concern..." onkeyup="revalidateTextArea(this)"></textarea>
                            <input type="submit" value="Submit Comment" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
            


@endsection

@section('scripts')
    <script>
        document.onreadystatechange = function(){
            if(document.readyState == 'complete'){
                if($("#jumpdown").length > 0){
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                }
            }
        }
        function showHideDiv(showdiv, hidediv){
                $('#'+showdiv).toggle();
                $('#'+hidediv).hide();
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            }
        
    </script>    
    <script src="{{ asset('js/submitresponse.js') }}"></script>
@endsection