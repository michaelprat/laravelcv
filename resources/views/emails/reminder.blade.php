<body>
    <h3>
     Hello {!! $detail['email'] !!}
    </h3>
    <p>
     Seseorang telah meminta pergantian password untuk akun anda,
       <br />
      Jika ini bukan anda hiraukan saja email ini,
      <br />
     Jika benar anda mohon klik link di bawah ini untuk melanjutkan,
    </p>
   {!!link_to(route('reminders.edit',['id'=>$detail['id'],'code'=>$detail['code']]),'Link ')!!}
     <h2>Terimakasih </h2>
   </body>