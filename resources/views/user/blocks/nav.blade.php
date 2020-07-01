<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a class="active"  href="{{asset('')}}">Home</a></li>
            <?php $menuLevel1 = App\Cate::where("parent_id",0)->get(); ?>
            @foreach($menuLevel1 as $itemLv1)
            <li><a href="category/{{$itemLv1->id}}/{{$itemLv1->alias}}">{{$itemLv1->name}}</a>
                <?php $menuLevel2 = App\Cate::where("parent_id",$itemLv1->id)->get();?>
                @if(count($menuLevel2) > 0)
                <div>
                    <ul>
                        @foreach($menuLevel2 as $itemLv2)
                        <li><a href="category/{{$itemLv2->id}}/{{$itemLv2->alias}}">{{$itemLv2->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </li>
            @endforeach
        </ul>
    </nav>
</div>