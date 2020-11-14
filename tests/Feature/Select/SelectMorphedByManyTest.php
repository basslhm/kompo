<?php

namespace Kompo\Tests\Feature\Select;

use Kompo\Tests\Models\File;

class SelectMorphedByManyTest extends SelectEnvironmentBootManyTest
{
    /** @test */
    public function select_works_with_morphed_by_many_plain_crud()
    {
        $this->assert_crud_many_selects(_SelectMorphedByManyForm::class, 'morphedByManyPlain', 'morphed_by_many_plain');
    }

    /** @test */
    public function select_works_with_morphed_by_many_ordered_crud()
    {
        $this->assert_crud_many_selects(_SelectMorphedByManyForm::class, 'morphedByManyOrdered', 'morphed_by_many_ordered');
    }

    /** @test */
    public function select_works_with_morphed_by_many_filtered_crud()
    {
        $this->assert_crud_many_selects(_SelectMorphedByManyForm::class, 'morphedByManyFiltered', 'morphed_by_many_filtered');
    }

    /** ------------------ PRIVATE --------------------------- */
    protected function assert_database_has_expected_row($file, $type = null) //overriden
    {
        return $this->assertDatabaseHas('file_obj', [
            'obj_id'     => 1,
            'model_type' => File::class,
            'model_id'   => $file->id,
            'order'      => $type == 'filtered' ? 1 : null,
        ]);
    }
}
