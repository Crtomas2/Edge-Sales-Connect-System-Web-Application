-- <div class="container mx-auto items-center" style="padding: 30px;">
    <div style="border: 1px lightgray solid; border-radius: 5px;">
        <div style="border-bottom: 1px lightgray solid; background-color:#f7f7f7; padding: 10px;">
          <center><h1 style="font-size: 20px;">Outlet Sending of Sales Report</h1></center>
       </div>
       <div style="background-color: white; padding:10px;">
        <div class="table-auto">
            <table class="table-auto container mx-auto px-8">   
                <thead>
                  <tr>
                   <center><th>Outlet</th></center>
                   <center><th>Sold Items of the day</th></center>
                  </tr>
                </thead>
                <tbody class="divide-y items-center">
                    @if ($tryCount->count() > 0)
                      @foreach ($tryCount as $outlet)
                      <tr>
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->outlet }}</td>           
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->total  }}</td>                    
                      </tr>    
                      @endforeach
                    @endif                   
                </tbody>
              </table>
        </div> 
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-10 shadow sm:rounded-bl-md sm:rounded-br-md">
          {{ $tryCount->links() }}
      </div>
       </div>
    </div> 
   </div>
   

  {{-- <div class="container mx-auto items-center" style="padding: 30px;">
      <div style="border: 1px lightgray solid; border-radius: 5px;">
      <div style="border-bottom: 1px lightgray solid; background-color:#f7f7f7; padding: 10px;">
        </div>
        <div style="background-color: white; padding:10px;">
          <div class="tab le-auto">
              <table class="table-auto container mx-auto px-8">
                  <thead>
                    <tr>
                    <center><th>Outlet</th></ce nter>
                    <center><th>Sold Items of the Week</th></center>
                    </tr>
                  </thead>
                  <tbody class="divide-y items-center">
                    @php
                      $sales = \App\Models\SMSApi::groupBy('outlet')->count();
                    @endphp
                      @if ($pagination->count() > 0)
                        @foreach ($pagination as $code)
                        <tr>
                          <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $code->outlet }}</td>           
                          <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $code->stock_code }}</td>           
                          <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $tryCount  }}</td>                    
                        </tr>    
                        @endforeach
                      @endif                   
                  </tbody>
                </table>
          </div> 
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-10 shadow sm:rounded-bl-md sm:rounded-br-md">
            {{ $pagination->links() }}
        </div>
        </div>
      </div> 
    </div> --}}