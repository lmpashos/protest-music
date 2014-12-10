xquery version "3.0";
let $songs := collection('/db/course/protest')/*

let $protest :=
    for $song in $songs
    where $song/metadata/protest = "1"
    return $song
let $nonprotest :=
    for $song in $songs
    where not($song/metadata/protest = "1")
    return $song
    
let $protestNounPhrases := 
    for $song in $protest
    return $song//nounPhrase
let $nonprotestNounPhrases :=
    for $song in $nonprotest
    return $song//nounPhrase
    
let $protestVerbPhrases := 
    for $song in $protest
    return $song//verbPhrase
let $nonprotestVerbPhrases :=
    for $song in $nonprotest
    return $song//verbPhrase
    
let $countProtest := count($protestNounPhrases)
let $countNonprotest := count($nonprotestNounPhrases)

let $countProtestVerb := count($protestVerbPhrases)
let $countNonprotestVerb := count($nonprotestVerbPhrases)

let $protestWithAdj :=
    for $nounPhrase in $protestNounPhrases
    where $nounPhrase//adjective
    return $nounPhrase
let $nonprotestWithAdj:=
    for $nounPhrase in $nonprotestNounPhrases
    where $nounPhrase//adjective
    return $nounPhrase
    
let $protestWithAdv :=
    for $verbPhrase in $protestVerbPhrases
    where $verbPhrase//adverb
    return $verbPhrase
let $nonprotestWithAdv:=
    for $verbPhrase in $nonprotestVerbPhrases
    where $verbPhrase//verb
    return $verbPhrase
    
let $protestNegatedNoun :=
    for $nounPhrase in $protestNounPhrases
    where $nounPhrase[@neg = "true"]
    return $nounPhrase
let $nonprotestNegatedNoun :=
    for $nounPhrase in $nonprotestNounPhrases
    where $nounPhrase[@neg = "true"]
    return $nounPhrase
    
let $protestNegatedVerb :=
    for $verbPhrase in $protestVerbPhrases
    where $verbPhrase[@neg = "true"]
    return $verbPhrase
let $nonprotestNegatedVerb :=
    for $verbPhrase in $nonprotestVerbPhrases
    where $verbPhrase[@neg = "true"]
    return $verbPhrase
    
let $countProtestWithAdj := count($protestWithAdj)
let $countNonprotestWithAdj := count($nonprotestWithAdj)

let $countProtestWithAdv := count($protestWithAdv)
let $countNonprotestWithAdv := count($nonprotestWithAdv)

let $countProtestNegatedNoun := count($protestNegatedNoun)
let $countNonprotestNegatedNoun := count($nonprotestNegatedNoun)

let $countProtestNegatedVerb := count($protestNegatedVerb)
let $countNonprotestNegatedVerb := count($nonprotestNegatedVerb)

return
    <data>
    {
        <song>
        {
            <title>Protest</title>,
            <protest>1</protest>,
            <verbPhrases>{$countProtestVerb}</verbPhrases>,
            <withAdverb>{$countProtestWithAdv}</withAdverb>,
            <negatedVerb>{$countProtestNegatedVerb}</negatedVerb>,
            <nounPhrases>{$countProtest}</nounPhrases>,
            <withAdj>{$countProtestWithAdj}</withAdj>,
            <negatedNoun>{$countProtestNegatedNoun}</negatedNoun>
        }
        </song>,
        <song>
        {
            <title>Non-Protest</title>,
            <protest>0</protest>,
            <verbPhrases>{$countNonprotestVerb}</verbPhrases>,
            <withAdverb>{$countNonprotestWithAdv}</withAdverb>,
            <negatedVerb>{$countNonprotestNegatedVerb}</negatedVerb>,
            <nounPhrases>{$countNonprotest}</nounPhrases>,
            <withAdj>{$countNonprotestWithAdj}</withAdj>,
            <negatedNoun>{$countNonprotestNegatedNoun}</negatedNoun>
        }
        </song>
    }
    </data>