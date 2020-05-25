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
                                                   <th>Nomor</th>
                                                   <th>Kode Quiz</th>
                                                   <th>Nama Soal</th>
                                                   <th>Nama Dosen</th>
                                                   <th>Nilai</th>
                                                   <th>Waktu Penilaian</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               @php
                                               $i=1;
                                               @endphp
                                               @foreach($scores as $score)
                                               <tr>
                                                   <th scope="row">{{$i}}</th>
                                                   <td>{{$score->question_id}}</td>
                                                   <td>{{$score->question->name}}</td>
                                                   <td>{{$score->question->owner->name}}</td>
                                                   @php
                                                   if ($score->score >= 70){
                                                   $bgclass="bg-success";}
                                                   elseif ($score->score >= 40){
                                                   $bgclass="bg-warning";}
                                                   else{
                                                   $bgclass="bg-danger";
                                                   }
                                                   @endphp
                                                   <td class="{{$bgclass}}">{{$score->score}}</td>
                                                   <td>{{$score->created_at}}</td>
                                               </tr>
                                               @php
                                               $i++;
                                               @endphp
                                               @endforeach
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>

                       </div>

                   </div>
               </div>