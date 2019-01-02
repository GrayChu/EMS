<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LLO</title>
</head>
<body>
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">PlayNitride</a>
    </div>
</nav>
<div class="container mt-3">
    <div>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDate">Date</label>
                    <input type="formFields datepicker" class="form-control" id="inputDate">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPerson">人員</label>
                    <input type="text" class="form-control" id="inputPerson">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputTE_A">max(lum)</label>
                    <input type="text" class="form-control" id="inputTE_A">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputENG_A_lower">max(lum)_spec下限</label>
                    <input type="text" class="form-control" id="inputENG_A_lower" placeholder="170" disabled value="170">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputENG_A_upper">max(lum)_spec上限</label>
                    <input type="text" class="form-control" id="inputENG_A_upper" placeholder="185" disabled value="185">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputTE_B">percent area_monitor(lum)</label>
                    <input type="text" class="form-control" id="inputTE_B">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputENG_B_lower">percent area_monitor(lum)_spec下限</label>
                    <input type="text" class="form-control" id="inputENG_B_lower" placeholder="65" disabled value="65">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputENG_B_upper">percent area_monitor(lum)_specg上限</label>
                    <input type="text" class="form-control" id="inputENG_B_upper" placeholder="85" disabled value="85">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputTE_C">percent area-beam size(lum)</label>
                    <input type="text" class="form-control" id="inputTE_C">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputENG_C_lower">percent area-beam size(lum)_spec下限</label>
                    <input type="text" class="form-control" id="inputENG_C_lower" placeholder="40" disabled value="40">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputENG_C_upper">percent area-beam size(lum)_spec上限</label>
                    <input type="text" class="form-control" id="inputENG_C_upper" placeholder="50" disabled value="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTE_D">fullpower(W)</label>
                    <input type="date" class="form-control" id="inputTE_D">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputENG_D">fullpower(W)_spec</label>
                    <input type="text" class="form-control" id="inputENG_D" placeholder="1.5" disabled value="1.5">
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
    <div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>人員</th>
                    <th>max(lum)</th>
                    <th>max(lum)_spec下限</th>
                    <th>max(lum)_spec上限</th>
                    <th>percent area_monitor(lum)</th>
                    <th>percent area_monitor(lum)_spec下限</th>
                    <th>percent area_monitor(lum)_spec上限</th>
                    <th>Percent area-beam size(lum)</th>
                    <th>Percent area-beam size(lum)_spec下限</th>
                    <th>Percent area-beam size(lum)_spec上限</th>
                    <th>fullpower(W)</th>
                    <th>fullpower(W)_spec</th>
                </tr>
            </thead>
            <tbody id="contents">
            </tbody>

        </table>
    </div>

    <script>
        $('#submit').click(function(){
            axios({
                method: 'post',
                url: '{{url('insertLLO')}}',
                data: {
                    date:$('#inputDate').val(),
                    name:$('#inputPerson').val(),
                    A:$('#inputTE_A').val(),
                    A_lower:$('#inputENG_A_lower').val(),
                    A_upper:$('#inputENG_A_upper').val(),
                    B:$('#inputTE_B').val(),
                    B_lower:$('#inputENG_B_lower').val(),
                    B_upper:$('#inputENG_B_upper').val(),
                    C:$('#inputTE_A').val(),
                    C_lower:$('#inputENG_C_lower').val(),
                    C_upper:$('#inputENG_C_upper').val(),
                    D: $('#inputTE_D').val(),
                    D_spec:$('#inputENG_D').val()
                }
            })
                .then(function(response){
                    alert('新增成功');
                    showLLOInfo(response.data);

                })
                .catch(function(error){
                })
        });
        let showLLOInfo=(data)=>{
            data.forEach(function(item){
                let newtr=$('<tr>');
                let col='';
                col+="<td>"+item.date+"</td>";
                col+="<td>"+item.name+"</td>";
                col+="<td>"+item.max_lum+"</td>";
                col+="<td>"+item.max_lum_spec_lower+"</td>";
                col+="<td>"+item.max_lum_spec_upper+"</td>";
                col+="<td>"+item.percent_area_monitor_lum+"</td>";
                col+="<td>"+item.percent_area_monitor_lum_lower+"</td>";
                col+="<td>"+item.percent_area_monitor_lum_upper+"</td>";
                col+="<td>"+item.percent_area_beam_size_lum+"</td>";
                col+="<td>"+item.percent_area_beam_size_lum_lower+"</td>";
                col+="<td>"+item.percent_area_beam_size_lum_upper+"</td>";
                col+="<td>"+item.fullpower_W+"</td>";
                col+="<td>"+item.fullpower_W_spec+"</td>";
                newtr.append(col);

                $('#contents').append(newtr);
            })
            $('.table').show();

        }
        $(document).ready(function(){
            $('.table').hide();
            $('#inputDate').datepicker({
                format:"yyyy/mm/dd",
                defaultDate:new Date(),
                locale:"zh-tw"
            });
        });
    </script>

</div>

</body>
</html>