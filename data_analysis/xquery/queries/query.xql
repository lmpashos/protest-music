xquery version "3.0";
let $songs := collection('/db/course/protest')/*

let $protest :=
    for $song in $songs
        where $song//protest = "true"
        return $song

for $song in $protest
    let $title := $song//title
    
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
            <protest>1</protest>
            <verbPhrases>{$countVerbPhrases}</verbPhrases>
            <withAdverb>{$countWithAdverb}</withAdverb>
            <negatedVerb>{$countNegatedVerb}</negatedVerb>
            <nounPhrases>{$countNounPhrases}</nounPhrases>
            <withAdj>{$countWithAdj}</withAdj>
            <negatedNoun>{$countNegatedNoun}</negatedNoun>
        </song>