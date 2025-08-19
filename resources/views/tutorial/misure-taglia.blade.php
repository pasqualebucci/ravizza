<div class="bg-white w-full">

    <div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 mb-4" role="alert">
        <div>
            <span class="font-bold">Attenzione!</span> Le misure indicate in questa tabella fanno riferimento al corpo e non al capo d'abbigliamento. Poiché i capi sono sartoriali e dunque tagliati e confezionati a mano dalle misure in tabella si considera una tolleranza del +/- 2%.
        </div>
    </div>

    <div class="relative overflow-x-auto ">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3 text-base">S</th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="col" class="px-6 py-3">TAGLIA</th>
                    <th scope="col" class="px-6 py-3">37</th>
                    <th scope="col" class="px-6 py-3">38</th>
                    <th scope="col" class="px-6 py-3">39</th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Collo</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '37' : '14.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '38' : '15' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '39' : '15.5' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Spalle</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '44' : '17.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '45' : '17.75' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '46' : '18' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Torace</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '94-96' : '37-38' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '97-99' : '38-39' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '100-102' : '39-40' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Girovita</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '81-83' : '32-33' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '84-86' : '33-34' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '87-89' : '34-35' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Bacino</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '91-93' : '36-37' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '94-96' : '37-38' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '97-99' : '38-39' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Lunghezza</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '78' : '30.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '78' : '30.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '79' : '31' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Braccio</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '64' : '25' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '64' : '25' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '65' : '25.5' }}{{$unitaMisure}}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4 sticky top-0">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3 text-base">M</th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="col" class="px-6 py-3">TAGLIA</th>
                    <th scope="col" class="px-6 py-3">39</th>
                    <th scope="col" class="px-6 py-3">40</th>
                    <th scope="col" class="px-6 py-3">41</th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Collo</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '39' : '15.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '40' : '17.75' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '41' : '16' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Spalle</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '46' : '18' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '47' : '18.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '48' : '19' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Torace</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '100-102' : '39-40' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '103-105' : '40-41' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '106-108' : '41-42' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Girovita</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '87-89' : '34-35' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '90-92' : '35-36' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '93-95' : '36-37' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Bacino</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '97-99' : '38-39' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '100-102' : '39-40' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '103-105' : '40-41' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Lunghezza</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '79' : '31' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '79' : '31' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '80' : '31.5' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Braccio</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '65' : '25.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '65' : '25.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '66' : '26' }}{{$unitaMisure}}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3 text-base">L</th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="col" class="px-6 py-3">TAGLIA</th>
                    <th scope="col" class="px-6 py-3">41</th>
                    <th scope="col" class="px-6 py-3">42</th>
                    <th scope="col" class="px-6 py-3">43</th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Collo</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '41' : '16' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '42' : '16.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '43' : '17' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Spalle</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '48' : '19' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '49' : '19.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '50' : '19.75' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Torace</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '106-108' : '41-42' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '109-111' : '42-43' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '112-114' : '44-45' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Girovita</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '93-95' : '36-37' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '96-98' : '38-39' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '99-101' : '39-40' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Bacino</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '103-105' : '40-41' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '106-108' : '42-43' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '109-111' : '43-44' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Lunghezza</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '80' : '31.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '80' : '31.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '81' : '32' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Braccio</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '66' : '26' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '66' : '26' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '67' : '26.5' }}{{$unitaMisure}}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3 text-base">XL</th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="col" class="px-6 py-3">TAGLIA</th>
                    <th scope="col" class="px-6 py-3">43</th>
                    <th scope="col" class="px-6 py-3">44</th>
                    <th scope="col" class="px-6 py-3">45</th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Collo</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '43' : '17' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '44' : '17.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '45' : '17.75' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Spalle</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '50' : '19.75' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '51' : '20' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '52' : '20.5' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Torace</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '112-114' : '44-45' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '115-117' : '45-46' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '118-121' : '46-47' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Girovita</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '99-101' : '39-40' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '102-104' : '40-41' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '105-108' : '41-42' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Bacino</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '109-111' : '43-44' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '112-114' : '44-45' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '115-118' : '45-46' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Lunghezza</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '81' : '32' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '81' : '32' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '82' : '32.5' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Braccio</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '67' : '26.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '67' : '26.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '68' : '27' }}{{$unitaMisure}}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3"></th> 
                    <th scope="col" class="px-6 py-3 text-base">XXL</th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="col" class="px-6 py-3">TAGLIA</th>
                    <th scope="col" class="px-6 py-3">45</th>
                    <th scope="col" class="px-6 py-3">46</th>
                    <th scope="col" class="px-6 py-3">47</th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Collo</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '45' : '17.75' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '46' : '18' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '47' : '18.5' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Spalle</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '52' : '20.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '54' : '21' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '56' : '22' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Torace</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '118-121' : '46-47' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '122-125' : '48-49' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '126-129' : '49-50' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Girovita</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '105-108' : '41-42' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '109-112' : '43-44' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '113-116' : '44-45' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Bacino</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '115-118' : '45-46' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '119-122' : '47-48' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '123-126' : '48-50' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Lunghezza</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '82' : '32.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '82' : '32.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '83' : '33' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Braccio</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '68' : '27' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '68' : '27' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '69' : '27.5' }}{{$unitaMisure}}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3 text-base">XXXL</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="col" class="px-6 py-3">TAGLIA</th>
                    <th scope="col" class="px-6 py-3">47</th>
                    <th scope="col" class="px-6 py-3">48</th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Collo</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '47' : '18.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '48' : '19' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Spalle</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '56' : '22' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '58' : '23' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Torace</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '126-129' : '49-50' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '130-133' : '51-53' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Girovita</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '113-116' : '44-45' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '117-120' : '46-47' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Bacino</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '123-126' : '48-50' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '127-130' : '50-52' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Lunghezza</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '83' : '33' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '83' : '33' }}{{$unitaMisure}}</td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Braccio</th>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '69' : '27.5' }}{{$unitaMisure}}</td>
                    <td class="px-6 py-4">{{$unitaMisure == 'cm' ? '69' : '27.5' }}{{$unitaMisure}}</td>
                </tr>
            </tbody>
        </table>


    </div>
</div>