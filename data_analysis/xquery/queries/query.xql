xquery version "3.0";
<data>
{
    let $songs := collection('/db/course/protest')/*
    
    for $song in $songs
        let $title := $song/metadata/title
        let $protest := $song/metadata/protest
    	let $era := $song/metadata/era
        
        let $countVerbPhrases := count($song//verbPhrase)
        let $withAdverb :=
            let $verbPhrases := $song//verbPhrase
            for $verbPhrase in $verbPhrases
                where $verbPhrase/adverb
                return $verbPhrase
        let $countWithAdverb := count($withAdverb)
        
        let $countNounPhrases := count($song//nounPhrase)
        let $withAdj :=
            let $nounPhrases := $song//nounPhrase
            for $nounPhrase in $nounPhrases
                where $nounPhrase/adjective
                return $nounPhrase
        let $countWithAdj := count($withAdj)
        
        let $negatedNoun :=
            let $nounPhrases := $song//nounPhrase
            for $nounPhrase in $nounPhrases
                where $nounPhrase[@neg = "true"]
                return $nounPhrase
        let $countNegatedNoun := count($negatedNoun)
        
        let $negatedVerb :=
            let $verbPhrases := $song//verbPhrase
            for $verbPhrase in $verbPhrases
                where $verbPhrase[@neg = "true"]
                return $verbPhrase
        let $countNegatedVerb := count($negatedVerb) 
        
        return 
            <song>
                {$title}
                {$protest}
    			{$era}
                <verbPhrases>{$countVerbPhrases}</verbPhrases>
                <withAdverb>{$countWithAdverb}</withAdverb>
                <negatedVerb>{$countNegatedVerb}</negatedVerb>
                <nounPhrases>{$countNounPhrases}</nounPhrases>
                <withAdj>{$countWithAdj}</withAdj>
                <negatedNoun>{$countNegatedNoun}</negatedNoun>
            </song>
}
</data>
