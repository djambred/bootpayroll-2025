<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PayrollDetailResource\Pages;
use App\Models\PayrollDetail;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PayrollDetailResource extends Resource
{
    protected static ?string $model = PayrollDetail::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Manage Payroll';
    protected static ?string $navigationLabel = 'Payroll Details';
    protected static ?string $pluralModelLabel = 'Payroll Details';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Usually not edited manually, skip
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('payroll.employee.user.name')
                ->label('Employee')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('payroll.period.name')
                ->label('Period')
                ->sortable(),

            Tables\Columns\TextColumn::make('name')
                ->label('Component')
                ->sortable()
                ->searchable(),

            Tables\Columns\BadgeColumn::make('type')
                ->label('Type')
                ->colors([
                    'success' => 'earning',
                    'danger' => 'deduction',
                ])
                ->sortable(),

            // Tables\Columns\TextColumn::make('amount')
            //     ->label('Amount')
            //     ->money('IDR', locale: 'id_ID')
            //     ->sortable(),
        ])
            ->filters([
                // Add optional filter by type or employee
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
                // Remove edit if you want this read-only
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayrollDetails::route('/'),
            // 'create' => Pages\CreatePayrollDetail::route('/create'), // optional
            // 'edit' => Pages\EditPayrollDetail::route('/{record}/edit'),
        ];
    }
}
