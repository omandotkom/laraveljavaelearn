               <div class="main-content">
                   <div class="container-fluid">
                       <div class="col-md-12">
                           <div class="card">
                               <div class="card-header d-block">
                                   <h3>Daftar Nilai Quiz</h3>
                               </div>
                               <div class="card-body p-0 table-border-style">
                                   <div class="table-responsive">
                                       <table class="table table-inverse">
                                           <thead>
                                               <tr>
                                                   <th>Kode Quiz</th>
                                                   <th>Nama Quiz</th>
                                                   <th>Nilai</th>
                                               </tr>
                                           </thead>
                                           
                                           <tbody>
                                               @php
                                               $totalScore = 0;
                                               @endphp
                                               @foreach($scores as $score)
                                               <tr>
                                                   <td>{{$score->question_id}}</td>
                                                   <td>{{$score->question->name}})</td>

                                                   @php
                                                   if ($score->score >= 70){
                                                   $bgclass="bg-success";}
                                                   elseif ($score->score >= 40){
                                                   $bgclass="bg-warning";}
                                                   else{
                                                   $bgclass="bg-danger";
                                                   }
                                                   $totalScore+=$score->score;
                                                   @endphp
                                                   <td class="{{$bgclass}}">{{$score->score}}</td>

                                               </tr>
                                               @endforeach
                                           </tbody>
                                       </table>
                                   </div>

                               </div>
                               @if(Auth::user()->role == "student")
                               <div class="card-footer">
                                   Rata Rata : {{$totalScore / $scores->count()}}
                               </div>
                               @endif
                           </div>

                       </div>

                   </div>
               </div>