@extends('layouts.template')

@section('title', 'Shop')


@section('main')
    <h1>Shop - Alternative listing</h1>



                    @foreach($genres as $genre)

                      <h2>{{ $genre->name }}</h2>


                          <?php $test=$genre->id ?>


                      @foreach($records as $record)
                          <?php $test1=$record->genre_id?>
            @if($test==$test1)




                                  <ul>
                                      <li> <a href="">{{ $record->artist }}&nbsp; -&nbsp; {{ $record->title }}  </a>  &nbsp;|&nbsp; PSrice: € {{ $record->price }} &nbsp;|&nbsp; Stock:&nbsp;{{ $record->stock }}    </li>
                                  </ul>
                              </div>
                        @endif
                      @endforeach


                    @endforeach












@endsection