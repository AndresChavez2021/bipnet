<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Http\Requests\StoreDatasetRequest;
use App\Http\Requests\UpdateDatasetRequest;
use App\Models\OportunidadDeVenta;
use App\Models\Venta;
use App\Models\DetalleServicio;
use App\Models\Producto_Servicio;
use App\Models\Cliente;
use Aws\Exception\AwsException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\ForecastService\ForecastServiceClient;
use Aws\ForecastQueryService\ForecastQueryServiceClient;
use Aws\S3\S3Client;
use Carbon\Carbon;
use DateTime;
use Exception;

date_default_timezone_set('America/La_Paz');

class DatasetController extends Controller
{
    protected $forecast;
    protected $forecastQuery;
    protected $s3Client;

    public function __construct()
    {
        /*$this->forecast = new ForecastServiceClient([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $this->s3Client = new S3Client([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $this->forecastQuery = new ForecastQueryServiceClient([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* $datasets = Dataset::select('*')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $datasets = $datasets->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('nombres', 'like', '%' . $request->search . '%');
        }
        $datasets = $datasets->paginate($limit)->appends($request->all());
        return view('datasets.index', compact('datasets'));
        */
    }

   

    public function queryStore(Request $request)
    {
    
       /* fclose($file);
        // Guardar el archivo en S3
        $disk = Storage::disk('s3');
        $disk->put('datasets/' . $filename, file_get_contents($filename), 'public');
        // Eliminar el archivo local después de guardarlo en S3
        unlink($filename);
        // Obtener la URL permanente del archivo
        $carpeta = 'datasets/' . $filename;
        $enlace = $disk->url($carpeta);
        Dataset::create([
            'url' => $enlace,
            'carpeta' => $carpeta,
            'filename' => $filename,
            'nombres' => json_encode($names)
        ]);
        return redirect(route('datasets.index'));
        */
    }

    function str_putcsv($data, $delimiter = ',', $enclosure = '"')
    {
        $str = '';
        foreach ($data as $field) {
            $str .= $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure . $delimiter;
        }
        return rtrim($str, $delimiter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$response = $this->forecastQuery->queryForecast([
            'EndDate' => '2023-03-01T00:00:00',
            'Filters' => [
                'item_id' => '1'
            ],
            'ForecastArn' => 'arn:aws:forecast:us-east-1:630886284847:forecast/forecast',
            'StartDate' => '2022-12-30T00:00:00',
        ]);
        $forecastData = $response->get('Forecast');
        $p10s = $forecastData['Predictions']['p10'];
        $datesP10s[] = array_column($p10s, 'Timestamp');
        $quantitiesP10s[] = array_column($p10s, 'Value');
        $p50s = $forecastData['Predictions']['p50'];
        $datesP50s[] = array_column($p50s, 'Timestamp');
        $quantitiesP50s[] = array_column($p50s, 'Value');
        $p90s = $forecastData['Predictions']['p90'];
        $datesP90s[] = array_column($p90s, 'Timestamp');
        $quantitiesP90s[] = array_column($p90s, 'Value');
        return view('datasets.create', compact('datesP10s', 'quantitiesP10s', 'datesP50s', 'quantitiesP50s', 'datesP90s', 'quantitiesP90s'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDatasetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $dataset = Dataset::findOrFail($request->id_dataset);
        $fechaIni = Carbon::parse('2022-12-30'); // Fecha inicial
        $fechaFin = $fechaIni->addDays($request->cantidad);
        $dias = $request->cantidad;
        // Obtener la nueva fecha en un formato específico
        $fechaFin = $fechaFin->format('Y-m-d');
        try {
            $response = $this->forecastQuery->queryForecast([
                'EndDate' => $fechaFin . 'T00:00:00',
                'Filters' => [
                    'item_id' => '1'
                ],
                'ForecastArn' => $dataset->forecastArn,
                'StartDate' => '2022-12-30T00:00:00',
            ]);
            $forecastData = $response->get('Forecast');
            $p10s = $forecastData['Predictions']['p10'];
            $datesP10s[] = array_column($p10s, 'Timestamp');
            $quantitiesP10s[] = array_column($p10s, 'Value');
            $p50s = $forecastData['Predictions']['p50'];
            $datesP50s[] = array_column($p50s, 'Timestamp');
            $quantitiesP50s[] = array_column($p50s, 'Value');
            $p90s = $forecastData['Predictions']['p90'];
            $datesP90s[] = array_column($p90s, 'Timestamp');
            $quantitiesP90s[] = array_column($p90s, 'Value');
            return view('datasets.create', compact('datesP10s', 'quantitiesP10s', 'datesP50s', 'quantitiesP50s', 'datesP90s', 'quantitiesP90s', 'dias'));
        } catch (AwsException $e) {
            return redirect()->route('datasets.index')->with('danger', $e->getMessage());
        }catch (Exception $e) {
            // Maneja otras excepciones generales
            return redirect()->route('datasets.index')->with('danger', $e->getMessage());
            // Realiza acciones para manejar el error de manera general, como registrar, notificar o manejar la excepción
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $dataset = Dataset::findOrFail($id);
        $nombres = json_decode($dataset->nombres);
        $result = $this->s3Client->getObject([
            'Bucket' => env('AWS_BUCKET'),
            'Key'    => $dataset->carpeta,
        ]);
        $csvContents = $result['Body']->getContents();
        //dd($csvContents);
        $lines = explode("\n", $csvContents);
        $headers = str_getcsv(array_shift($lines));
        $timestamps = [];
        $values = [];
        foreach ($lines as $line) {
            if (trim($line) !== '') {
                $row = str_getcsv(trim($line), ',', '"');
                $entry = array_combine($headers, $row);

                $timestamps[] = $entry['timestamp'];
                $values[] = $entry['target_value'];
            }
        }
        return view('datasets.show', compact('timestamps', 'values', 'nombres'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatasetRequest  $request
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
