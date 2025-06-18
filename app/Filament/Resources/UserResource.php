<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User; // Pastikan ini diimpor
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Filament\Forms\Components\Select; // Untuk memilih role

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?int $navigationSort = 5;

    // --- BAGIAN PENTING UNTUK OTORISASI (HANYA SUPER ADMIN BISA MELIHAT) ---
    public static function canViewAny(): bool
    {
        // Hanya user dengan role 'super_admin' yang bisa melihat daftar user dan menu navigasinya.
        // Pastikan Anda sudah login dan objek user tersedia melalui auth()->user()
        // Ini adalah cara Filament memeriksa apakah Resource ini harus ditampilkan.
        return auth()->user()->role === 'super_admin';
    }
    // ----------------------------------------------------------------------

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true) // Pastikan unik saat edit juga
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state)) // Otomatis hash password
                    ->dehydrated(fn (?string $state): bool => filled($state)) // Hanya isi jika ada input
                    ->required(fn (string $operation): bool => $operation === 'create'), // Wajib saat create
                Select::make('role') // Kolom role
                    ->options([
                        'user_biasa' => 'User Biasa',
                        'admin' => 'Admin',
                        'super_admin' => 'Super Admin',
                    ])
                    ->required()
                    ->default('user_biasa'), // Default role saat membuat user
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id') // Kolom ID di tabel
                    ->sortable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->badge() // Tampilkan sebagai badge
                    ->color(fn (string $state): string => match ($state) { // Warna badge berdasarkan role
                        'user_biasa' => 'gray',
                        'admin' => 'info',
                        'super_admin' => 'success',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'user_biasa' => 'User Biasa',
                        'admin' => 'Admin',
                        'super_admin' => 'Super Admin',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}