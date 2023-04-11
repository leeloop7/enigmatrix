use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class UserEventsSheet implements FromCollection, WithTitle, WithHeadings, WithStyles, WithColumnWidths
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function collection()
    {
        $events = $this->user->events()
            ->whereMonth('event_start', '=', 3)
            ->orderBy('event_start')
            ->get();

        // Group events by day
        $groupedEvents = $events->groupBy(function ($event) {
            return Carbon::parse($event->event_start)->format('Y-m-d');
        });

        // Map each group to an array of events
        $mappedEvents = $groupedEvents->map(function ($group) {
            return $group->map(function ($event) {
                return [
                    'id' => $event->id,
                    'datum' => Carbon::parse($event->event_start)->format('d-m-Y'),
                    'začetek' => Carbon::parse($event->event_start)->format('H:i:s'),
                    'konec' => Carbon::parse($event->event_end)->format('H:i:s'),
                    'trajanje' => Carbon::parse($event->event_difference)->format('H:i:s'),
                    'vrsta' => $event->job->name,
                    'tema' => $event->JobDesc->name,
                    'stranka' => $event->customer->name,
                    'projekt' => $event->project->name,
                    'opis' => $event->event_desc,
                ];
            });
        });

        // Flatten the mapped events array
        $flattenedEvents = $mappedEvents->flatten(1);

        return $flattenedEvents;
    }

    public function title(): string
    {
        return $this->user->name;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Datum',
            'Začetek',
            'Konec',
            'Trajanje',
            'Vrsta',
            'Tema',
            'Stranka',
            'Projekt',
            'Opis',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 12,
            'C' => 11,
            'D' => 11,
            'E' => 10,
            'F' => 20,
            'G' => 20,
            'H' => 15,
            'I' => 15,
            'J' => 60,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styleArray = [
            'font' => [
                'bold' => true,
                '
