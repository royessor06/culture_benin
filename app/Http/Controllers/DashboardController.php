<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Payment;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques
        $stats = [
            'total_users' => Utilisateur::count(),
            'total_contents' => Contenu::count(),
            'published_contents' => Contenu::where('statut', 'Publié')->count(),
            'pending_contents' => Contenu::where('statut', 'Brouillon')->count(),
            'published_percentage' => Contenu::count() > 0 ?
                round((Contenu::where('statut', 'Publié')->count() / Contenu::count()) * 100, 0) : 0,
            'pending_percentage' => Contenu::count() > 0 ?
                round((Contenu::where('statut', 'Brouillon')->count() / Contenu::count()) * 100, 0) : 0,
            'total_comments' => Commentaire::count(),

            'total_revenue' => Payment::where('status', 'success')->sum('amount'),
            'user_growth' => $this->calculateGrowth(Utilisateur::class, 'created_at'),
            'revenue_growth' => $this->calculateGrowth(Payment::class, 'created_at', 'amount', 'success'),
            'last_comment_time' => Commentaire::latest()->first() ?
                Commentaire::latest()->first()->created_at->diffForHumans() : 'Aucun'
        ];

        // Activités récentes
        $recent_activities = $this->getRecentActivities();

        // Contenus récents
        $recent_contents = Contenu::with(['typeContenu', 'auteur', 'medias'])
            ->latest()
            ->take(5)
            ->get();

        return view('welcome', compact('stats', 'recent_activities', 'recent_contents'));
    }

    private function calculateGrowth($model, $dateField, $amountField = null, $status = null)
    {
        $currentMonth = now()->startOfMonth();
        $lastMonth = now()->subMonth()->startOfMonth();

        $queryCurrent = $model::where($dateField, '>=', $currentMonth);
        $queryLast = $model::whereBetween($dateField, [$lastMonth, $currentMonth]);

        if ($status) {
            $queryCurrent->where('status', $status);
            $queryLast->where('status', $status);
        }

        $current = $amountField ? $queryCurrent->sum($amountField) : $queryCurrent->count();
        $last = $amountField ? $queryLast->sum($amountField) : $queryLast->count();

        return $last > 0 ? round((($current - $last) / $last) * 100, 1) : ($current > 0 ? 100 : 0);
    }

    private function getRecentActivities()
    {
        $activities = [];

        // Derniers utilisateurs
        $recentUsers = Utilisateur::latest()->take(3)->get();
        foreach ($recentUsers as $user) {
            $activities[] = [
                'icon' => 'user-plus',
                'color' => 'primary',
                'title' => 'Nouvel utilisateur',
                'description' => $user->prenom . ' ' . $user->nom . ' s\'est inscrit',
                'time' => $user->created_at->diffForHumans()
            ];
        }

        // Derniers contenus
        $recentContents = Contenu::latest()->take(2)->get();
        foreach ($recentContents as $content) {
            $activities[] = [
                'icon' => 'file-alt',
                'color' => 'success',
                'title' => 'Nouveau contenu',
                'description' => '«' . Str::limit($content->titre, 30) . '» ajouté',
                'time' => $content->created_at->diffForHumans()
            ];
        }

        // Derniers paiements
        $recentPayments = Payment::where('status', 'success')->latest()->take(2)->get();
        foreach ($recentPayments as $payment) {
            $activities[] = [
                'icon' => 'coins',
                'color' => 'warning',
                'title' => 'Nouveau paiement',
                'description' => number_format($payment->amount, 0, ',', ' ') . ' FCFA reçus',
                'time' => $payment->created_at->diffForHumans()
            ];
        }

        // Trier par date
        usort($activities, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });

        return array_slice($activities, 0, 5);
    }
}
