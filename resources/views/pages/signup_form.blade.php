@extends('app')
@section('content1')


<?php
use App\User;
?>

@include('nav')

<div class="form_con">
{!! Form::open(array('method' => 'POST', 'url'=>'signup_user', 'id'=>'form1')) !!}
    <div class="form-group">
        {!! Form::label('Name', 'Name : ') !!}
        {!! Form::text('name',null,['class'=>'form-control_new']) !!}
    
     
    </div>
    <div class="form-group">
        {!! Form::label('Email', 'Email Address :') !!}
        {!! Form::email('email',null,['class'=>'form-control_new']) !!}
        
        
    </div><br>

    <div class="form-group">
        {!! Form::label('Description', 'Write something about yourself ( or your company ) : ') !!}
        {!! Form::textarea('description',null,['class'=>'form-control_text', 'style'=>'max-height: 100px;']) !!}
        
        
     
    </div>
    
    <div class="form-group">
        {!! Form::label('Password', 'Type Your Password :') !!}
        {!! Form::password('password', ['class'=>'form-control_new', 'id'=>'password']) !!}
        
    </div><br>
    <div class="form-group">
        {!! Form::label('Password_confirmation', 'Confirm Your Password :') !!}
        {!! Form::password('password_confirmation', ['class'=>'form-control_new']) !!}
    </div><br>

   
    <div class="form-group">
        {!! Form::label('phone', 'Phone No . :') !!}
        {!! Form::text('phone', null, ['class'=>'form-control_new']) !!}
      </div><br>

    <div class="form-group">
        {!! Form::label('companyName', 'Company Name : ') !!}
        {!! Form::text('companyName', null, ['class'=>'form-control_new']) !!}
       
     
    </div>
    <div class="form-group">
        {!! Form::label('companyWebsite', 'Company Website URL :') !!}
        {!! Form::text('companyWebsite', null, ['class'=>'form-control_new']) !!}
        
        
    </div><br>

    <div class="form-group">
        {!! Form::label('com_email', 'Company Email :') !!}
        {!! Form::email('com_email', null, ['class'=>'form-control_new']) !!}
        
    </div><br>
   
    <div class="form-group">
        {!!Form::label('com_country', 'Country of your company : ')!!}
     
        <select name="com_country" class="form-control_new">
          
            <option selected="selected"></option>
            <option value="Afganistán">Afganistán</option>
            <option value="Albania">Albania</option>
            <option value="Alemania">Alemania</option>
            <option value="Andorra">Andorra</option>
            <option value="Anguila">Anguila</option>
            <option value="Antigua República Yugoslava de Macedonia">Antigua República Yugoslava de Macedonia</option>
            <option value="Antigua y Barbuda">Antigua y Barbuda</option>
            <option value="Arabia Saudí">Arabia Saudí</option>
            <option value="Argelia">Argelia</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaiyán">Azerbaiyán</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahráin">Bahráin</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Bélgica">Bélgica</option>
            <option value="Belice">Belice</option>
            <option value="Benín">Benín</option>
            <option value="Bermudas">Bermudas</option>
            <option value="Bielorrusia">Bielorrusia</option>
            <option value="Birmania">Birmania</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
            <option value="Botsuana">Botsuana</option>
            <option value="Brasil">Brasil</option>
            <option value="Brunéi">Brunéi</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Bután">Bután</option>
            <option value="Cabo Verde">Cabo Verde</option>
            <option value="Camboya">Camboya</option>
            <option value="Camerún">Camerún</option>
            <option value="Canadá">Canadá</option>
            <option value="Chad">Chad</option>
            <option value="Chequia">Chequia</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Chipre">Chipre</option>
            <option value="Cisjordania y Franja de Gaza">Cisjordania y Franja de Gaza</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoras">Comoras</option>
            <option value="Congo">Congo</option>
            <option value="Corea del Norte">Corea del Norte</option>
            <option value="Corea del Sur">Corea del Sur</option>
            <option value="Costa de Marfil">Costa de Marfil</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croacia">Croacia</option>
            <option value="Cuba">Cuba</option>
            <option value="Dinamarca">Dinamarca</option>
            <option value="Dominica">Dominica</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egipto">Egipto</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Eslovaquia">Eslovaquia</option>
            <option value="Eslovenia">Eslovenia</option>
            <option value="España">España</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Estonia">Estonia</option>
            <option value="Estonia">Estonia</option>
            <option value="Etiopía">Etiopía</option>
            <option value="Filipinas">Filipinas</option>
            <option value="Finlandia">Finlandia</option>
            <option value="Fiyi">Fiyi</option>
            <option value="Francia">Francia</option>
            <option value="Gabón">Gabón</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Ghana">Ghana</option>
            <option value="Granada">Granada</option>
            <option value="Grecia">Grecia</option>
            <option value="Guadalupe">Guadalupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
            <option value="Guyana">Guyana</option>
            <option value="Haití">Haití</option>
            <option value="Holanda">Holanda</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungría">Hungría</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Irán">Irán</option>
            <option value="Iraq">Iraq</option>
            <option value="Irlanda">Irlanda</option>
            <option value="Islandia">Islandia</option>
            <option value="Islas Marshall">Islas Marshall</option>
            <option value="Islas Salomón">Islas Salomón</option>
            <option value="Israel">Israel</option>
            <option value="Italia">Italia</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japón">Japón</option>
            <option value="Jordania">Jordania</option>
            <option value="Kazajistán">Kazajistán</option>
            <option value="Kenia">Kenia</option>
            <option value="Kirguizistán">Kirguizistán</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Laos">Laos</option>
            <option value="Lesoto">Lesoto</option>
            <option value="Letonia">Letonia</option>
            <option value="Líbano">Líbano</option>
            <option value="Liberia">Liberia</option>
            <option value="Libia">Libia</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lituania">Lituania</option>
            <option value="Luxemburgo">Luxemburgo</option>
            <option value="Macedonia">Macedonia</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malasia">Malasia</option>
            <option value="Malaui">Malaui</option>
            <option value="Maldivas">Maldivas</option>
            <option value="Malí">Malí</option>
            <option value="Malta">Malta</option>
            <option value="Marruecos">Marruecos</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauricio">Mauricio</option>
            <option value="México">México</option>
            <option value="Micronesia">Micronesia</option>
            <option value="Moldavia">Moldavia</option>
            <option value="Mónaco">Mónaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Nueva Zelanda">Nueva Zelanda</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Níger">Níger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Noruega">Noruega</option>
            <option value="Omán">Omán</option>
            <option value="Países Bajos">Países Bajos</option>
            <option value="Pakistán">Pakistán</option>
            <option value="Palau">Palau</option>
            <option value="Palestina">Palestina</option>
            <option value="Panamá">Panamá</option>
            <option value="Papúa-Nueva Guinea">Papúa-Nueva Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Perú">Perú</option>
            <option value="Polonia">Polonia</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Quatar">Quatar</option>
            <option value="Reino Unido">Reino Unido</option>
            <option value="República Centroafricana">República Centroafricana</option>
            <option value="República Democrática del Congo">República Democrática del Congo</option>
            <option value="República Dominicana">República Dominicana</option>
            <option value="Rumania">Rumania</option>
            <option value="Rusia">Rusia</option>
            <option value="Ruanda">Ruanda</option>
            <option value="Sahara Occidental">Sahara Occidental</option>
            <option value="Samoa">Samoa</option>
            <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
            <option value="San Marino">San Marino</option>
            <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
            <option value="Santa Lucía">Santa Lucía</option>
            <option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leona">Sierra Leona</option>
            <option value="Singapur">Singapur</option>
            <option value="Siria">Siria</option>
            <option value="Somalía">Somalía</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudáfrica">Sudáfrica</option>
            <option value="Sudán">Sudán</option>
            <option value="Suecia">Suecia</option>
            <option value="Suiza">Suiza</option>
            <option value="Surinam">Surinam</option>
            <option value="Suazilandia">Suazilandia</option>
            <option value="Tailandia">Tailandia</option>
            <option value="Taiwán">Taiwán</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Tayikistán">Tayikistán</option>
            <option value="Timor Oriental">Timor Oriental</option>
            <option value="Togo">Togo</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad y Tobago">Trinidad y Tobago</option>
            <option value="Túnez">Túnez</option>
            <option value="Turkmenistán">Turkmenistán</option>
            <option value="Turquía">Turquía</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Ucrania">Ucrania</option>
            <option value="Uganda">Uganda</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistán">Uzbekistán</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Vaticano">Vaticano</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Yemen">Yemen</option>
            <option value="Yibuti">Yibuti</option>
            <option value="Yugoslavia">Yugoslavia</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabue">Zimbabue</option>
        </select>
        
    </div>

    <div class="form-group">
        {!! Form::label('Contact_no', 'Contact No. :') !!}
        {!! Form::text('contact_no', null, ['class'=>'form-control_new']) !!}
    </div><br>

    

    <div class="form-group">
        {!!Form::label('address', 'Company Address: ')!!}
     
        {!!Form::text('address', null, ['class'=>'form-control_new'])!!}
   </div>


    

    <br><br><br>

    <?php
    $admin= User::where('userRoleId', 1)->first();
    ?>

    <input type="hidden" name="email_admin" value="{{$admin->email}}">
    <input type="hidden" name="name_admin" value="{{$admin->name}}">
    <input type="hidden" name="role" value="{{$role}}">
    
    <div class="form-group">
        {!! Form::submit('Create Account', ['class' => 'btn btn-info']) !!}
        <a href="<?php echo Request::root();?>/" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
</div>

<script>

 $("#form1").validate({
        rules: {
          name: 
                {
                    required: true,
                    minlength: 3
                },    
                email: 
                {             
                    required: true,
                    email: true
                },
                password:
                {
                    required: true,
                    minlength: 5
                },
                password_confirmation: {
                    required: true,
                    equalTo: ("#password"),
                    minlength: 5

                },
                description:
                {
                    minlength: 10
                },
                companyName:
                {
                    required: true
                },
                companyWebsite:
                {
                    required: true,
                    url: true
                },
                com_email:
                {
                    required: true,
                    email: true
                },
                com_country:
                {
                    required: true
                },
                contact_no:
                {
                    required: true
                },
                address:
                {
                    required: true
                }


                
        },
        messages:
        {
            name: 
            {
                required: "Name is required",
                minlength: "Name must contain at least 3 characters"
            },

            email: 
            {
                email: "Please enter valid email address",
                required: "Email field can't be empty"
            },

            password:
            {
                minlength: "Password must contain at least 5 characters",
                required: "Password is required"
            },

            password_confirmation:
            {
                required: "Password confirmation is required",
                minlength: "At least 5 characters",
                equalTo: "Must match with password"
            },
            description:
            {
                minlength: "Description must contain at least 10 characters"
            },
            
            companyWebsite:
            {
                url: "Please enter a valid url"
            },
            com_email:
            {
               
                email: "Please enter a valid email address"
            }
        }
      });

    </script>
    <br><br>
    
@include('footer')
@stop
